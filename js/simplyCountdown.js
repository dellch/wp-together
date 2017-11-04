/*!
 * Project : simply-countdown
 * File : simplyCountdown
 * Date : 27/06/2015
 * License : MIT
 * Version : 1.3.1
 * Author : Vincent Loy <vincent.loy1@gmail.com>
 */
!function (e) {
    "use strict";
    var t, n, s, o;
    t = function (e) {
        var n, s, o;
        for (e = e || {}, n = 1; n < arguments.length; n += 1)if (s = arguments[n])for (o in s)s.hasOwnProperty(o) && ("object" == typeof s[o] ? t(e[o], s[o]) : e[o] = s[o]);
        return e
    }, s = function (e, t, n) {
        var s, o, r, a;
        return o = document.createElement("div"), r = document.createElement("span"), a = document.createElement("span"), s = document.createElement("div"), s.appendChild(r), s.appendChild(a), o.appendChild(s), o.classList.add(t.sectionClass), o.classList.add(n), r.classList.add(t.amountClass), a.classList.add(t.wordClass), e.appendChild(o), {
            full: o,
            amount: r,
            word: a
        }
    }, n = function (e, t) {
        var n;
        return e.inline ? (n = document.createElement("span"), n.classList.add(e.inlineClass), n) : {
            days: s(t, e, "simply-days-section"),
            hours: s(t, e, "simply-hours-section"),
            minutes: s(t, e, "simply-minutes-section"),
            seconds: s(t, e, "simply-seconds-section")
        }
    }, o = function (e, s) {
        var o, r, a, d, i, u, l, c, m, w, p = t({
            year: 2015,
            month: 6,
            day: 28,
            hours: 0,
            minutes: 0,
            seconds: 0,
            words: {days: "day", hours: "hour", minutes: "minute", seconds: "second", pluralLetter: "s"},
            plural: !0,
            inline: !1,
            enableUtc: !0,
            onEnd: function () {
            },
            refresh: 1e3,
            inlineClass: "simply-countdown-inline",
            sectionClass: "simply-section",
            amountClass: "simply-amount",
            wordClass: "simply-word"
        }, s), y = document.querySelectorAll(e);
        a = new Date(p.year, p.month - 1, p.day, p.hours, p.minutes, p.seconds), r = p.enableUtc ? new Date(a.getUTCFullYear(), a.getUTCMonth(), a.getUTCDate(), a.getUTCHours(), a.getUTCMinutes(), a.getUTCSeconds()) : a, Array.prototype.forEach.call(y, function (e) {
            var t = n(p, e);
            o = window.setInterval(function () {
                var n, s, a, y;
                d = new Date, p.enableUtc ? (i = new Date(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds()), u = (r - i.getTime()) / 1e3) : u = (r - d.getTime()) / 1e3, u > 0 ? (l = parseInt(u / 86400, 10), u %= 86400, c = parseInt(u / 3600, 10), u %= 3600, m = parseInt(u / 60, 10), w = parseInt(u % 60, 10)) : (l = 0, c = 0, m = 0, w = 0, window.clearInterval(o), p.onEnd()), p.plural ? (n = l > 1 ? p.words.days + p.words.pluralLetter : p.words.days, s = c > 1 ? p.words.hours + p.words.pluralLetter : p.words.hours, a = m > 1 ? p.words.minutes + p.words.pluralLetter : p.words.minutes, y = w > 1 ? p.words.seconds + p.words.pluralLetter : p.words.seconds) : (n = p.words.days, s = p.words.hours, a = p.words.minutes, y = p.words.seconds), p.inline ? e.innerHTML = l + " " + n + ", " + c + " " + s + ", " + m + " " + a + ", " + w + " " + y + "." : (t.days.amount.textContent = l, t.days.word.textContent = n, t.hours.amount.textContent = c, t.hours.word.textContent = s, t.minutes.amount.textContent = m, t.minutes.word.textContent = a, t.seconds.amount.textContent = w, t.seconds.word.textContent = y)
            }, p.refresh)
        })
    }, e.simplyCountdown = o
}(window), window.jQuery && !function (e, t) {
    "use strict";
    function n(e, n) {
        t(e, n)
    }

    e.fn.simplyCountdown = function (e) {
        return n(this.selector, e)
    }
}(jQuery, simplyCountdown);
