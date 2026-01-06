/**
 * Customer Profile Page JavaScript
 * Handles:
 * - Form validation
 * - Save button feedback
 * - Animated stat counters
 * - Festive greeting
 *
 * Author: <Your Name>
 * Feature: Customer Profile Page
 */

document.addEventListener("DOMContentLoaded", () => {

    /* ===============================
       FESTIVE GREETING (Time-based)
    ================================ */
    const greetingText = document.querySelector(".profile-header p");
    const hour = new Date().getHours();

    if (hour < 12) {
        greetingText.textContent = "☀️ Good morning, festive elf!";
    } else if (hour < 18) {
        greetingText.textContent = "🎅 Good afternoon! Ready to win?";
    } else {
        greetingText.textContent = "🌙 Good evening! Let the games begin!";
    }

    /* ===============================
       ANIMATED PROFILE STAT COUNTERS
    ================================ */
    const stats = document.querySelectorAll(".stat-number");

    stats.forEach(stat => {
        const target = Number(stat.dataset.value);
        let current = 0;

        const counter = setInterval(() => {
            current++;
            stat.textContent = current;

            if (current >= target) {
                clearInterval(counter);
            }
        }, 10);
    });

    /* ===============================
       FORM VALIDATION & UX FEEDBACK
    ================================ */
    const form = document.querySelector(".profile-form form");
    const username = form.querySelector("input[name='username']");
    const email = form.querySelector("input[name='email']");
    const saveBtn = form.querySelector("button");

    form.addEventListener("submit", (e) => {

        // Basic validation
        if (username.value.trim() === "" || email.value.trim() === "") {
            e.preventDefault();
            alert("🎅 Ho ho ho! Please fill in all fields.");
            return;
        }

        // UX feedback
        saveBtn.textContent = "Saving... 🎄";
        saveBtn.disabled = true;
    });

});
