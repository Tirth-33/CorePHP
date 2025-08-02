<?php
// Set default timezone to IST (Indian Standard Time)
date_default_timezone_set('Asia/Kolkata');

// Raw timestamp
echo "🕒 Timestamp: " . time() . "<br>";

// Standard format
echo "📅 Date & Time (Y-m-d H:i:s): " . date("Y-m-d H:i:s") . "<br>";

// Day-Month-Year format
echo "📆 Date (d-m-Y): " . date("d-m-Y") . "<br>";

// Month name and day
echo "🌞 Date (F j, Y): " . date("F j, Y") . "<br>";

// 12-hour format with AM/PM
echo "🕰️ Time (g:i A): " . date("g:i A") . "<br>";

// ISO 8601 format
echo "🗂️ ISO 8601: " . date(DATE_ISO8601) . "<br>";

// RFC 2822 format
echo "📨 RFC 2822: " . date(DATE_RFC2822) . "<br>";
?>