<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head>
section and everything up until
<div id="content">
 * * @link
  https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * * @package indicus */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
</head>

<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <div class="menu--container__wrapper">
    <div class="menu--container">
      <div class="menu--logo">
        <a href="https://indicus.hipl-staging1.com/">
          <svg class="logo" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 370.83 81.93">
            <defs>
              <style>
                .cls-1,
                .cls-2 {
                  fill: none;
                }

                .cls-2 {
                  clip-rule: evenodd;
                }

                .cls-3 {
                  clip-path: url(#clip-path);
                }

                .cls-4 {
                  fill: #01d4ba;
                }

                .cls-5 {
                  clip-path: url(#clip-path-2);
                }

                .cls-6 {
                  fill: url(#linear-gradient);
                }

                .cls-7 {
                  clip-path: url(#clip-path-3);
                }

                .cls-8 {
                  fill: url(#linear-gradient-2);
                }

                .cls-9 {
                  fill: #371800;
                }

                .cls-10 {
                  fill: #ffd66e;
                }

                .cls-11 {
                  clip-path: url(#clip-path-4);
                }

                .cls-12 {
                  fill: url(#linear-gradient-3);
                }

                .cls-13 {
                  clip-path: url(#clip-path-5);
                }

                .cls-14 {
                  fill: url(#linear-gradient-4);
                }

                .cls-15 {
                  clip-path: url(#clip-path-6);
                }

                .cls-16 {
                  fill: url(#linear-gradient-5);
                }

                .cls-17 {
                  fill: #ffe28a;
                }

                .cls-18 {
                  fill: #caa14a;
                }

                .cls-19 {
                  fill: #ffefb8;
                }

                .cls-20 {
                  fill: #b76100;
                }

                .cls-21 {
                  clip-path: url(#clip-path-7);
                }

                .cls-22 {
                  clip-path: url(#clip-path-8);
                }

                .cls-23 {
                  clip-path: url(#clip-path-9);
                }

                .cls-24 {
                  fill: url(#linear-gradient-6);
                }

                .cls-25 {
                  clip-path: url(#clip-path-10);
                }

                .cls-26 {
                  fill: url(#linear-gradient-7);
                }

                .cls-27 {
                  clip-path: url(#clip-path-11);
                }

                .cls-28 {
                  fill: url(#linear-gradient-8);
                }

                .cls-29 {
                  clip-path: url(#clip-path-12);
                }

                .cls-30 {
                  fill: url(#linear-gradient-9);
                }

                .cls-31 {
                  clip-path: url(#clip-path-13);
                }

                .cls-32 {
                  fill: url(#linear-gradient-10);
                }

                .cls-33 {
                  clip-path: url(#clip-path-14);
                }

                .cls-34 {
                  fill: url(#linear-gradient-11);
                }

                .cls-35 {
                  clip-path: url(#clip-path-15);
                }

                .cls-36 {
                  fill: url(#linear-gradient-12);
                }

                .cls-37 {
                  clip-path: url(#clip-path-16);
                }

                .cls-38 {
                  fill: url(#linear-gradient-13);
                }

                .cls-39 {
                  clip-path: url(#clip-path-17);
                }

                .cls-40 {
                  fill: url(#linear-gradient-14);
                }

                .cls-41 {
                  clip-path: url(#clip-path-18);
                }

                .cls-42 {
                  fill: url(#linear-gradient-15);
                }

                .cls-43 {
                  clip-path: url(#clip-path-19);
                }

                .cls-44 {
                  fill: url(#linear-gradient-16);
                }

                .cls-45 {
                  clip-path: url(#clip-path-20);
                }

                .cls-46 {
                  fill: url(#linear-gradient-17);
                }

                .cls-47 {
                  opacity: 0.43;
                }

                .cls-48 {
                  clip-path: url(#clip-path-21);
                }

                .cls-49 {
                  clip-path: url(#clip-path-22);
                }

                .cls-50 {
                  fill: url(#linear-gradient-18);
                }

                .cls-51 {
                  clip-path: url(#clip-path-23);
                }

                .cls-52 {
                  fill: url(#linear-gradient-19);
                }

                .cls-53 {
                  clip-path: url(#clip-path-24);
                }

                .cls-54 {
                  fill: url(#linear-gradient-20);
                }

                .cls-55 {
                  clip-path: url(#clip-path-25);
                }

                .cls-56 {
                  fill: url(#linear-gradient-21);
                }

                .cls-57 {
                  clip-path: url(#clip-path-26);
                }

                .cls-58 {
                  fill: url(#linear-gradient-22);
                }

                .cls-59 {
                  clip-path: url(#clip-path-27);
                }

                .cls-60 {
                  fill: url(#linear-gradient-23);
                }

                .cls-61 {
                  clip-path: url(#clip-path-28);
                }

                .cls-62 {
                  fill: url(#linear-gradient-24);
                }

                .cls-63 {
                  clip-path: url(#clip-path-29);
                }

                .cls-64 {
                  clip-path: url(#clip-path-30);
                }

                .cls-65 {
                  fill: url(#linear-gradient-25);
                }

                .cls-66 {
                  opacity: 0.38;
                }

                .cls-67 {
                  clip-path: url(#clip-path-31);
                }

                .cls-68 {
                  clip-path: url(#clip-path-32);
                }

                .cls-69 {
                  fill: url(#linear-gradient-26);
                }

                .cls-70 {
                  clip-path: url(#clip-path-33);
                }

                .cls-71 {
                  clip-path: url(#clip-path-34);
                }

                .cls-72 {
                  fill: url(#linear-gradient-27);
                }

                .cls-73 {
                  clip-path: url(#clip-path-35);
                }

                .cls-74 {
                  fill: url(#linear-gradient-28);
                }

                .cls-75 {
                  clip-path: url(#clip-path-36);
                }

                .cls-76 {
                  fill: url(#linear-gradient-29);
                }

                .cls-77 {
                  clip-path: url(#clip-path-37);
                }

                .cls-78 {
                  clip-path: url(#clip-path-38);
                }

                .cls-79 {
                  clip-path: url(#clip-path-39);
                }

                .cls-80 {
                  clip-path: url(#clip-path-40);
                }

                .cls-81 {
                  clip-path: url(#clip-path-41);
                }

                .cls-82 {
                  fill: url(#linear-gradient-30);
                }

                .cls-83 {
                  clip-path: url(#clip-path-42);
                }

                .cls-84 {
                  fill: url(#linear-gradient-31);
                }

                .cls-85 {
                  clip-path: url(#clip-path-43);
                }

                .cls-86 {
                  clip-path: url(#clip-path-44);
                }

                .cls-87 {
                  clip-path: url(#clip-path-45);
                }

                .cls-88 {
                  clip-path: url(#clip-path-46);
                }

                .cls-89 {
                  fill: #8160ec;
                }
              </style>
              <clipPath id="clip-path" transform="translate(0.16 -2)">
                <rect class="cls-1" x="-1" y="1" width="372.68" height="83.93"></rect>
              </clipPath>
              <clipPath id="clip-path-2" transform="translate(0.16 -2)">
                <path class="cls-2" d="M25.36,28.63c-.51.07-1.06.56-1.64,1.46a21.64,21.64,0,0,0-.44,2.49A20.64,20.64,0,0,0,24,43.06q1.85,5,.62,12.27a4.8,4.8,0,0,0,.83,2.47,62.54,62.54,0,0,1,2.61,5.71Q29.15,66.09,30.4,69a16.59,16.59,0,0,0,1-4.86,38.28,38.28,0,0,1-.53-4.31,5.33,5.33,0,0,1,0-.71c0-.34.11-.52.23-.53h0a2.19,2.19,0,0,0,.53-.45Q42.52,41.15,29,38q-1.36-9.33-3.46-9.33h-.13"></path>
              </clipPath>
              <linearGradient id="linear-gradient" x1="30.68" y1="46.8" x2="23.27" y2="46.75" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#d58800"></stop>
                <stop offset="1" stop-color="#ffd770"></stop>
              </linearGradient>
              <clipPath id="clip-path-3" transform="translate(0.16 -2)">
                <path class="cls-2" d="M59.37,29.53c-1.27.16-2.6,3.12-4,8.87q-13.65,1.6-3.93,20c.11,0,.2,0,.26.23a4.52,4.52,0,0,1-.09,1.46c-.13.76-.39,2.09-.77,4a16.17,16.17,0,0,0,.8,5.11,43.17,43.17,0,0,1,4.76-8.87c1.37-1.9,2-3,2-3.44q-.86-7.41.81-11.45l2.29-12q0-.9-.12-1.62c-.64-1.5-1.28-2.25-1.94-2.25h-.11"></path>
              </clipPath>
              <linearGradient id="linear-gradient-2" x1="53.43" y1="47.34" x2="60.8" y2="47.39" xlink:href="#linear-gradient"></linearGradient>
              <clipPath id="clip-path-4" transform="translate(0.16 -2)">
                <path class="cls-2" d="M25.46,27.55a1.38,1.38,0,0,0-.92.61,5.59,5.59,0,0,0-.82,1.93Q27,24.92,29,38q13.58,3.19,2.74,20.16a3.66,3.66,0,0,1,4.31.46c2.4,1.83,4.42,2.64,6.07,2.46a11,11,0,0,0,5.28-2.44q2.82-2.18,4.13-.23Q41.76,40,55.41,38.4q3.18-13.35,6-6.63c-.05-.4-.11-.77-.17-1.1-.42-2-1.19-2.75-2.34-2.3l-7.37,2.85q-4.08.36-8.33.31l-1.25,0a1,1,0,0,0-.24,0c-2.82-.09-5.59-.3-8.29-.65l-7.17-3.17a1.6,1.6,0,0,0-.64-.15h-.16"></path>
              </clipPath>
              <linearGradient id="linear-gradient-3" x1="42.26" y1="58.25" x2="43.1" y2="28.83" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#efa921"></stop>
                <stop offset="0.29" stop-color="#ffd268"></stop>
                <stop offset="0.79" stop-color="#ffd770"></stop>
                <stop offset="1" stop-color="#f0ac26"></stop>
              </linearGradient>
              <clipPath id="clip-path-5" transform="translate(0.16 -2)">
                <path class="cls-2" d="M49.72,59.69l-6.64,3.53a2.44,2.44,0,0,1-2.43.11,46.79,46.79,0,0,0-7.45-3.49A3.72,3.72,0,0,0,32,59.66c-.27,0-.42.16-.44.38A15.83,15.83,0,0,0,32,64.36a6.6,6.6,0,0,1-.77,4.54c-.51.81-.3,2,.63,3.52.07.34.74.57,2,.73a6.08,6.08,0,0,1,2.87,2.9,1.81,1.81,0,0,0,1.66,1q5.66.89,6.57-1.62.66-2,4.17-2.62c1.62-.33,2-2.35,1.12-6a18.88,18.88,0,0,1,.7-5.88c.24-1,.12-1.55-.34-1.55a1.91,1.91,0,0,0-.91.36"></path>
              </clipPath>
              <linearGradient id="linear-gradient-4" x1="40.34" y1="71.23" x2="42.14" y2="60.49" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#371800"></stop>
                <stop offset="1" stop-color="#782200"></stop>
              </linearGradient>
              <clipPath id="clip-path-6" transform="translate(0.16 -2)">
                <path class="cls-2" d="M50.38,59.67a6.34,6.34,0,0,0-3.13,2,11.62,11.62,0,0,1-3.76,2.62c-1.45.62-3.32.08-5.59-1.62s-4-2.62-5.27-2.75a.72.72,0,0,0-.55.69,42.79,42.79,0,0,0,1.56,9.72q1.65,4.65,9.36,4,6.2-.56,6.4-6.86a25.89,25.89,0,0,1,1-5.47c.56-1.59.6-2.38.12-2.38h-.1"></path>
              </clipPath>
              <linearGradient id="linear-gradient-5" x1="41.58" y1="73.15" x2="41.77" y2="57.01" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#371800"></stop>
                <stop offset="1" stop-color="#ca3807"></stop>
              </linearGradient>
              <clipPath id="clip-path-7" transform="translate(0.16 -2)">
                <path class="cls-2" d="M47,64.15a4.1,4.1,0,0,1,.06.49v0a3.25,3.25,0,0,1-1.43,2.67,6.31,6.31,0,0,1-3.72,1.2,6.43,6.43,0,0,1-3.84-1A3.22,3.22,0,0,1,36.4,64.8s0,0,0-.06,0-.2,0-.3A2,2,0,0,1,36.5,64c-.16-.62-.48-.91-1-.84l-.2,0a3.32,3.32,0,0,0-.24.62,2,2,0,0,0-.11.4,4.24,4.24,0,0,0-.08.88,4.61,4.61,0,0,0,2.13,3.82,7.78,7.78,0,0,0,5,1.47,7.58,7.58,0,0,0,4.75-1.66A4.59,4.59,0,0,0,48.59,65a3.46,3.46,0,0,0-.12-.92A4,4,0,0,0,48.06,63l-.19,0c-.38,0-.68.39-.9,1.19"></path>
              </clipPath>
              <clipPath id="clip-path-8" transform="translate(0.16 -2)">
                <polygon class="cls-1" points="32.97 63.5 35.92 73.94 50.57 69.84 47.62 59.4 32.97 63.5"></polygon>
              </clipPath>
              <clipPath id="clip-path-9" transform="translate(0.16 -2)">
                <path class="cls-2" d="M61.41,47.74h0c-.88,0-1.82,0-2.83.11a12.5,12.5,0,0,0,1.27,9.54,11.33,11.33,0,0,0,1-.49c.41-.2.56-.74.48-1.62.13.11,1.58.72,4.36,1.86s5.71,1,9.18-.14c.31-.1.31-.42,0-1a20.43,20.43,0,0,0-6.75-7,14.14,14.14,0,0,0-6.72-1.25"></path>
              </clipPath>
              <linearGradient id="linear-gradient-6" x1="63.52" y1="47.17" x2="68.36" y2="53.2" xlink:href="#linear-gradient-4"></linearGradient>
              <clipPath id="clip-path-10" transform="translate(0.16 -2)">
                <path class="cls-2" d="M17.92,46.2a8.78,8.78,0,0,0-2.8.79,21.5,21.5,0,0,0-7.27,6.63.44.44,0,0,0,.1.7q5.52,3.91,12.94-.31a3.84,3.84,0,0,1,1-.41c-.09.76.05,1.24.41,1.43l.87.46a12,12,0,0,0,1.66-9.1l-.34,0-.3,0-1-.11-.72-.06c-.74,0-1.44-.08-2.1-.08a19.4,19.4,0,0,0-2.4.14"></path>
              </clipPath>
              <linearGradient id="linear-gradient-7" x1="17.44" y1="52.33" x2="16.32" y2="47.77" xlink:href="#linear-gradient-4"></linearGradient>
              <clipPath id="clip-path-11" transform="translate(0.16 -2)">
                <path class="cls-2" d="M7,10.12a39.61,39.61,0,0,0-5.79,9.74c-.19.51-.35.95-.46,1.32a14.57,14.57,0,0,0-.39,1.58,17.93,17.93,0,0,0,.15,7.53A22.3,22.3,0,0,0,2.7,36.23a18.84,18.84,0,0,0,1.61,2.39q.33.41.69.81a22,22,0,0,0,7.15,5.1l.61.27a20.66,20.66,0,0,0,5.72,1.47c.4,0,.81.1,1.24.12a38.47,38.47,0,0,0,5.07,0c2.05-5.75,2.42-10,.88-15l-3.39-.62a15,15,0,0,1-5.15-2.08,8.56,8.56,0,0,1-1.48-1.3,6.26,6.26,0,0,1-1.18-2A7.26,7.26,0,0,1,14,23.1a10.33,10.33,0,0,1,.16-2q.11-.51.48-1.89,1.69-6.17,0-10.57A11.37,11.37,0,0,0,7.4,2Q10.6,5.35,7,10.12"></path>
              </clipPath>
              <linearGradient id="linear-gradient-8" x1="24.29" y1="29.82" x2="2.07" y2="13.99" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#01ada8"></stop>
                <stop offset="0.83" stop-color="#03d6bc"></stop>
                <stop offset="1" stop-color="#03d6bc"></stop>
              </linearGradient>
              <clipPath id="clip-path-12" transform="translate(0.16 -2)">
                <path class="cls-2" d="M71.71,11q-2.07,4.26-.87,10.53c.17.94.28,1.59.31,1.95a8.9,8.9,0,0,1,0,2,7,7,0,0,1-.63,2.3,6.26,6.26,0,0,1-1.34,1.85,8.59,8.59,0,0,1-1.57,1.18,14.78,14.78,0,0,1-5.3,1.66l-3.43.34c-1.59,4.07-1.58,7.82-1,12.34a16.6,16.6,0,0,1,.63,2.74,43.38,43.38,0,0,0,5.06.36l1.24,0a20,20,0,0,0,5.82-1l.64-.21a22.22,22.22,0,0,0,7.43-4.4l.1-.1.75-.77a18.4,18.4,0,0,0,1.79-2.23,22.46,22.46,0,0,0,2.69-5.76,18.29,18.29,0,0,0,.76-7.49,14.23,14.23,0,0,0-.27-1.61c-.08-.37-.2-.83-.34-1.35a40.06,40.06,0,0,0-5-10.19Q76,8,79.46,4.94a11.42,11.42,0,0,0-7.75,6"></path>
              </clipPath>
              <linearGradient id="linear-gradient-9" x1="64.21" y1="26.79" x2="90.29" y2="18.7" xlink:href="#linear-gradient-8"></linearGradient>
              <clipPath id="clip-path-13" transform="translate(0.16 -2)">
                <path class="cls-2" d="M19.72,46.39a38.47,38.47,0,0,0,5.07,0q3.53-8,.88-15l-3.39-.62q-4.58,7.94-2.56,15.62"></path>
              </clipPath>
              <linearGradient id="linear-gradient-10" x1="21.2" y1="41.56" x2="24.45" y2="32.98" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#290c00"></stop>
                <stop offset="1" stop-color="#5b1900"></stop>
              </linearGradient>
              <clipPath id="clip-path-14" transform="translate(0.16 -2)">
                <path class="cls-2" d="M5,39.43a22,22,0,0,0,7.15,5.1q-2.64-9.27,5-15.84a8.56,8.56,0,0,1-1.48-1.3Q6.13,29.85,5,39.43"></path>
              </clipPath>
              <linearGradient id="linear-gradient-11" x1="10.41" y1="34.52" x2="16.33" y2="30.39" xlink:href="#linear-gradient-10"></linearGradient>
              <clipPath id="clip-path-15" transform="translate(0.16 -2)">
                <path class="cls-2" d="M7.41,20.68h0a14.33,14.33,0,0,0-1.44.1,16.2,16.2,0,0,0-5.61,2,17.93,17.93,0,0,0,.15,7.53A22.3,22.3,0,0,0,2.7,36.23q1-5.22,4.23-7.76a14.36,14.36,0,0,1,7.54-3A7.26,7.26,0,0,1,14,23.1a10.4,10.4,0,0,0-6.61-2.42"></path>
              </clipPath>
              <linearGradient id="linear-gradient-12" x1="3.35" y1="29.1" x2="11.33" y2="23.77" xlink:href="#linear-gradient-10"></linearGradient>
              <clipPath id="clip-path-16" transform="translate(0.16 -2)">
                <path class="cls-2" d="M7,10.12a39.61,39.61,0,0,0-5.79,9.74q7.1-3.67,13,1.22.11-.51.48-1.89,1.69-6.17,0-10.57A11.37,11.37,0,0,0,7.4,2Q10.6,5.35,7,10.12"></path>
              </clipPath>
              <linearGradient id="linear-gradient-13" x1="9.36" y1="16.93" x2="8.71" y2="10.25" xlink:href="#linear-gradient-10"></linearGradient>
              <clipPath id="clip-path-17" transform="translate(0.16 -2)">
                <path class="cls-2" d="M58.89,32.76a18.51,18.51,0,0,0-1.12,12.36,23,23,0,0,0,.79,2.72,43.38,43.38,0,0,0,5.06.36,19.68,19.68,0,0,0,.93-3.91,21.57,21.57,0,0,0-2.23-11.87Z"></path>
              </clipPath>
              <linearGradient id="linear-gradient-14" x1="61.52" y1="43.29" x2="60.73" y2="35.24" xlink:href="#linear-gradient-10"></linearGradient>
              <clipPath id="clip-path-18" transform="translate(0.16 -2)">
                <path class="cls-2" d="M67.62,30.76q5.63,5.7,4.65,12.58a17.39,17.39,0,0,1-1,3.61,22.22,22.22,0,0,0,7.43-4.4l.1-.1q-.36-9.64-9.66-12.87a8.59,8.59,0,0,1-1.57,1.18"></path>
              </clipPath>
              <linearGradient id="linear-gradient-15" x1="74.97" y1="39.66" x2="71.76" y2="32.72" xlink:href="#linear-gradient-10"></linearGradient>
              <clipPath id="clip-path-19" transform="translate(0.16 -2)">
                <path class="cls-2" d="M71.71,11q-2.07,4.26-.87,10.53c.17.94.28,1.59.31,1.95a11.2,11.2,0,0,1,13.08-.19h0a40,40,0,0,0-5-10.18Q76,8,79.46,4.94a11.42,11.42,0,0,0-7.75,6"></path>
              </clipPath>
              <linearGradient id="linear-gradient-16" x1="78.14" y1="17.56" x2="76.52" y2="7.27" xlink:href="#linear-gradient-10"></linearGradient>
              <clipPath id="clip-path-20" transform="translate(0.16 -2)">
                <path class="cls-2" d="M75.85,23.52a10.41,10.41,0,0,0-4.69,1.91,7,7,0,0,1-.63,2.3,13.21,13.21,0,0,1,7.82,4,12.26,12.26,0,0,1,3,7.73,22.46,22.46,0,0,0,2.69-5.76,18.29,18.29,0,0,0,.76-7.49,13.79,13.79,0,0,0-7.72-2.77,8.93,8.93,0,0,0-1.27.09"></path>
              </clipPath>
              <linearGradient id="linear-gradient-17" x1="80.38" y1="31.12" x2="75.07" y2="27.41" xlink:href="#linear-gradient-10"></linearGradient>
              <clipPath id="clip-path-21" transform="translate(0.16 -2)">
                <rect class="cls-1" x="57.42" y="7.31" width="18.91" height="30.24"></rect>
              </clipPath>
              <clipPath id="clip-path-22" transform="translate(0.16 -2)">
                <path class="cls-2" d="M73.23,10.39a10.36,10.36,0,0,0-1.45,3.84,17.3,17.3,0,0,0-.2,3.73,23.19,23.19,0,0,0,.48,3.68,16.09,16.09,0,0,1,.34,2.69,7.32,7.32,0,0,1-1,4.1,7.79,7.79,0,0,1-2.62,2.7,13.22,13.22,0,0,1-3.41,1.52,18.38,18.38,0,0,1-2.2.49c-1.29.23-3.37.41-4.67.58a13.65,13.65,0,0,0-.8,2.53c-.06.36-.2.92-.25,1.3a42.8,42.8,0,0,0,6.76-.77,18.74,18.74,0,0,0,5.51-2,9.41,9.41,0,0,0,3.55-3.37,9.77,9.77,0,0,0,.88-1.85,10.7,10.7,0,0,0,.62-3,13.52,13.52,0,0,0-.32-3.68c-.26-1.14-.54-2.27-.85-3.38A16.62,16.62,0,0,1,73,16.44c0-.31,0-.62,0-.93,0-.59,0-1.17,0-1.74a8.71,8.71,0,0,1,2.7-5.85c.21-.22.42-.42.63-.61a9.31,9.31,0,0,0-3.1,3.08"></path>
              </clipPath>
              <linearGradient id="linear-gradient-18" x1="-1.94" y1="75.14" x2="23.23" y2="61.16" gradientTransform="translate(57.58 -48.38)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#01ada8"></stop>
                <stop offset="0.15" stop-color="#03d6bc"></stop>
                <stop offset="0.86" stop-color="#03d6bc"></stop>
                <stop offset="1" stop-color="#00bcb9"></stop>
              </linearGradient>
              <clipPath id="clip-path-23" transform="translate(0.16 -2)">
                <path class="cls-2" d="M25.1,48.34H25a18.09,18.09,0,0,0-2.11.14,14.1,14.1,0,0,0-8.82,4.76,34,34,0,0,0,11-3.48,11.2,11.2,0,0,0,0-1.42"></path>
              </clipPath>
              <linearGradient id="linear-gradient-19" x1="15.62" y1="51.82" x2="23.89" y2="45.77" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#290c00"></stop>
                <stop offset="0.66" stop-color="#290c00"></stop>
                <stop offset="1" stop-color="#5b1900"></stop>
              </linearGradient>
              <clipPath id="clip-path-24" transform="translate(0.16 -2)">
                <path class="cls-2" d="M17.92,46.2a8.78,8.78,0,0,0-2.8.79,21.5,21.5,0,0,0-7.27,6.63.48.48,0,0,0-.12.29h0q6.65-7.1,17.37-5.58a11.9,11.9,0,0,0-.28-2l-.34,0-.3,0-1-.11-.72-.06c-.74,0-1.44-.08-2.1-.08a19.4,19.4,0,0,0-2.4.14"></path>
              </clipPath>
              <linearGradient id="linear-gradient-20" x1="9.53" y1="52.94" x2="22.68" y2="43.69" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#ec9428"></stop>
                <stop offset="0.68" stop-color="#ec9428"></stop>
                <stop offset="1" stop-color="#782200"></stop>
              </linearGradient>
              <clipPath id="clip-path-25" transform="translate(0.16 -2)">
                <path class="cls-2" d="M58.06,51.16a34.48,34.48,0,0,0,10.76,4.26h0a14.32,14.32,0,0,0-10.68-5.67,11.11,11.11,0,0,0-.08,1.41"></path>
              </clipPath>
              <linearGradient id="linear-gradient-21" x1="63.38" y1="50.26" x2="67.9" y2="57.07" xlink:href="#linear-gradient-19"></linearGradient>
              <clipPath id="clip-path-26" transform="translate(0.16 -2)">
                <path class="cls-2" d="M60.23,47.77c-.34,0-.69,0-1,0a1.43,1.43,0,0,0-.29,0h-.35a11.81,11.81,0,0,0-.4,1.91Q68.9,49,75,56.48a.56.56,0,0,0-.1-.3,22.69,22.69,0,0,0-6.85-7.29c-1.53-.91-3.89-1.12-7.15-1.13h-.71"></path>
              </clipPath>
              <linearGradient id="linear-gradient-22" x1="71.69" y1="51.29" x2="56.94" y2="47.8" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#ec9428"></stop>
                <stop offset="1" stop-color="#782200"></stop>
              </linearGradient>
              <clipPath id="clip-path-27" transform="translate(0.16 -2)">
                <path class="cls-2" d="M32.9,70.47A13.25,13.25,0,0,0,41,74.65,16.27,16.27,0,0,0,49.86,71q-9.49,4.32-17-.55"></path>
              </clipPath>
              <linearGradient id="linear-gradient-23" x1="43.65" y1="173.34" x2="43.62" y2="171.88" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#290c00"></stop>
                <stop offset="0.51" stop-color="#8c1c00"></stop>
                <stop offset="1" stop-color="#8c1c00"></stop>
              </linearGradient>
              <clipPath id="clip-path-28" transform="translate(0.16 -2)">
                <path class="cls-2" d="M29.88,32.2h0c.5,3.11,1.38,4.9,2.64,5.39a8.7,8.7,0,0,1,5.75,7.66c1.34.27,2.77.5,4.3.7A21.29,21.29,0,0,0,46.42,45a5.4,5.4,0,0,1,.7-4.5,4.91,4.91,0,0,1,3.76-1.91q2.84-.26,4.71-6.31c-.23.52-1.25,1-3.08,1.32a86.2,86.2,0,0,1-10,1Z"></path>
              </clipPath>
              <linearGradient id="linear-gradient-24" x1="43.68" y1="18.27" x2="42.72" y2="41.08" xlink:href="#linear-gradient"></linearGradient>
              <clipPath id="clip-path-29" transform="translate(0.16 -2)">
                <rect class="cls-1" x="10.31" y="4.48" width="16.42" height="31.54"></rect>
              </clipPath>
              <clipPath id="clip-path-30" transform="translate(0.16 -2)">
                <path class="cls-2" d="M26.73,36h0a8.46,8.46,0,0,0-.17-1.17,15.62,15.62,0,0,0-.6-2.63c-1.32-.23-3.38-.53-4.65-.87a20.44,20.44,0,0,1-2.14-.68,12.69,12.69,0,0,1-3.27-1.8A7.66,7.66,0,0,1,13.52,26a7.3,7.3,0,0,1-.68-4.18,15.92,15.92,0,0,1,.56-2.66,23.9,23.9,0,0,0,.8-3.62,17.19,17.19,0,0,0,.11-3.73,10.3,10.3,0,0,0-1.12-3.95,9.15,9.15,0,0,0-2.83-3.34c.2.21.39.44.58.66a8.7,8.7,0,0,1,2.19,6.07q0,.85-.09,1.74c0,.3-.08.6-.13.91a17.35,17.35,0,0,1-.83,3c-.4,1.08-.78,2.18-1.13,3.3a12.7,12.7,0,0,0-.63,3.63,10.39,10.39,0,0,0,.36,3,9.1,9.1,0,0,0,.72,1.92,9.33,9.33,0,0,0,3.25,3.66A18.61,18.61,0,0,0,20,34.88,42.61,42.61,0,0,0,26.73,36"></path>
              </clipPath>
              <linearGradient id="linear-gradient-25" x1="18.33" y1="72.87" x2="-5.35" y2="61.86" gradientTransform="translate(10.47 -49.91)" xlink:href="#linear-gradient-18"></linearGradient>
              <clipPath id="clip-path-31" transform="translate(0.16 -2)">
                <rect class="cls-1" x="0.49" y="27.52" width="25.82" height="18.67"></rect>
              </clipPath>
              <clipPath id="clip-path-32" transform="translate(0.16 -2)">
                <path class="cls-2" d="M2.57,34.53A17.59,17.59,0,0,0,7,40.33a22.79,22.79,0,0,0,6.85,4.14c2.61,1,6.9,1.5,11,1.72a24.87,24.87,0,0,0,1.43-4.27h0A33.51,33.51,0,0,1,12.1,38.68,10.15,10.15,0,0,0,16.39,43Q4.15,39,.49,27.52a24.37,24.37,0,0,0,2.08,7"></path>
              </clipPath>
              <linearGradient id="linear-gradient-26" x1="22.59" y1="82.72" x2="7.46" y2="70.03" gradientTransform="translate(0.65 -39.75)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#04d6bd"></stop>
                <stop offset="1" stop-color="#00a7a4"></stop>
              </linearGradient>
              <clipPath id="clip-path-33" transform="translate(0.16 -2)">
                <rect class="cls-1" x="57.46" y="31.09" width="26.75" height="16.59"></rect>
              </clipPath>
              <clipPath id="clip-path-34" transform="translate(0.16 -2)">
                <path class="cls-2" d="M67.05,45.13a10.13,10.13,0,0,0,4.64-3.91,32.85,32.85,0,0,1-14.23,2.32,29.21,29.21,0,0,0,1,4.1c4.12.13,8.27,0,11-.8a22.46,22.46,0,0,0,7.17-3.54,17.66,17.66,0,0,0,4.92-5.4,24.53,24.53,0,0,0,2.67-6.81q-4.63,11.13-17.16,14"></path>
              </clipPath>
              <linearGradient id="linear-gradient-27" x1="4.03" y1="83.9" x2="18.2" y2="71.43" gradientTransform="translate(57.61 -38.25)" xlink:href="#linear-gradient-26"></linearGradient>
              <clipPath id="clip-path-35" transform="translate(0.16 -2)">
                <path class="cls-2" d="M34.62,49.93s2.07-8.5-6.29-8.82c0,0-2.43,9,6.29,8.82"></path>
              </clipPath>
              <linearGradient id="linear-gradient-28" x1="29.57" y1="45.5" x2="32.5" y2="42.59" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#290c00"></stop>
                <stop offset="1" stop-color="#4e1600"></stop>
              </linearGradient>
              <clipPath id="clip-path-36" transform="translate(0.16 -2)">
                <path class="cls-2" d="M34.55,49.74s-.24-6.35-5.94-8.16c0,0-1.61,7.58,5.94,8.16"></path>
              </clipPath>
              <linearGradient id="linear-gradient-29" x1="29.3" y1="44.44" x2="33.68" y2="42.35" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#fefce5"></stop>
                <stop offset="0.56" stop-color="#fefce5"></stop>
                <stop offset="1" stop-color="#af9b6e"></stop>
              </linearGradient>
              <clipPath id="clip-path-37" transform="translate(0.16 -2)">
                <path class="cls-2" d="M30,46l2.08-.48L30.6,46.91a3,3,0,0,0,3.55.64,9.09,9.09,0,0,0-3.25-4.84A3,3,0,0,0,30,46"></path>
              </clipPath>
              <clipPath id="clip-path-38" transform="translate(0.16 -2)">
                <rect class="cls-1" x="28.38" y="41.9" width="7.02" height="7.07" transform="translate(-22.39 33.83) rotate(-42.87)"></rect>
              </clipPath>
              <clipPath id="clip-path-39" transform="translate(0.16 -2)">
                <path class="cls-2" d="M30.92,45.77l1.22-.28-.88.82a2.26,2.26,0,0,0,2.72.53,9.08,9.08,0,0,0-2.45-3.69,2.26,2.26,0,0,0-.61,2.62"></path>
              </clipPath>
              <clipPath id="clip-path-40" transform="translate(0.16 -2)">
                <polygon class="cls-1" points="32.65 41.45 28.51 44.74 31.84 49 35.99 45.71 32.65 41.45"></polygon>
              </clipPath>
              <clipPath id="clip-path-41" transform="translate(0.16 -2)">
                <path class="cls-2" d="M54.58,41.69c-7.74,1-5.34,9.08-5.34,9.08,8.72-.22,5.83-9.13,5.83-9.13l-.49,0"></path>
              </clipPath>
              <linearGradient id="linear-gradient-30" x1="54.57" y1="45.95" x2="51.56" y2="43.35" xlink:href="#linear-gradient-28"></linearGradient>
              <clipPath id="clip-path-42" transform="translate(0.16 -2)">
                <path class="cls-2" d="M49.3,50.58c7.51-1,5.51-8.45,5.51-8.45-5.6,2.09-5.51,8.45-5.51,8.45"></path>
              </clipPath>
              <linearGradient id="linear-gradient-31" x1="54.49" y1="44.85" x2="50.24" y2="43.24" xlink:href="#linear-gradient-29"></linearGradient>
              <clipPath id="clip-path-43" transform="translate(0.16 -2)">
                <path class="cls-2" d="M49.58,48.37a3,3,0,0,0,3.52-.82l-1.59-1.33,2.1.37a3,3,0,0,0-1-3.22,9.12,9.12,0,0,0-3,5"></path>
              </clipPath>
              <clipPath id="clip-path-44" transform="translate(0.16 -2)">
                <rect class="cls-1" x="48.24" y="42.69" width="7.06" height="6.91" transform="translate(-16.84 56.26) rotate(-50.09)"></rect>
              </clipPath>
              <clipPath id="clip-path-45" transform="translate(0.16 -2)">
                <path class="cls-2" d="M49.73,47.65A2.22,2.22,0,0,0,52.41,47l-.92-.77,1.23.22A2.26,2.26,0,0,0,52,43.84a9,9,0,0,0-2.25,3.81"></path>
              </clipPath>
              <clipPath id="clip-path-46" transform="translate(0.16 -2)">
                <polygon class="cls-1" points="50.85 42.24 55.06 45.26 51.96 49.67 47.74 46.66 50.85 42.24"></polygon>
              </clipPath>
            </defs>
            <g class="cls-3">
              <path class="cls-4" d="M81,45.68A38.26,38.26,0,1,1,42.77,7.42,38.25,38.25,0,0,1,81,45.68" transform="translate(0.16 -2)"></path>
              <g class="cls-5">
                <rect class="cls-6" x="22.81" y="26.62" width="16.25" height="40.35"></rect>
              </g>
              <g class="cls-7">
                <rect class="cls-8" x="45.15" y="27.52" width="16.54" height="39.64"></rect>
              </g>
              <path class="cls-9" d="M31.16,58.56h0l.14,0a.23.23,0,0,0-.13,0" transform="translate(0.16 -2)"></path>
              <path class="cls-10" d="M42.07,61c-1.65.18-3.67-.63-6.07-2.46a3.66,3.66,0,0,0-4.31-.46,2.19,2.19,0,0,1-.53.45.23.23,0,0,1,.13,0l-.14,0,.5.11h0c.92.26,1.62.48,2.12.65q2.4.78,8,3.21l9.74-4.17q-1.3-1.95-4.13.23A11,11,0,0,1,42.07,61" transform="translate(0.16 -2)"></path>
              <g class="cls-11">
                <rect class="cls-12" x="23.87" y="24.64" width="37.7" height="34.57"></rect>
              </g>
              <path class="cls-9" d="M31.6,58.67h0l-.5-.11c-.12,0-.2.19-.23.53a5.33,5.33,0,0,0,0,.71,38.28,38.28,0,0,0,.53,4.31,16.59,16.59,0,0,1-1,4.86c-.09.25-.18.52-.27.8s.05.59.36,1.17a7.66,7.66,0,0,1,.78,2c.05.32.34.54.85.67a7,7,0,0,1,2.41,1,6.58,6.58,0,0,1,1.76,2.21,1.77,1.77,0,0,0,1.34.75,15.55,15.55,0,0,0,2.65.25h.89a19.37,19.37,0,0,0,2.64-.28,2,2,0,0,0,1.41-.77,7.26,7.26,0,0,1,1.9-2.21,7.57,7.57,0,0,1,2.48-1c.51-.14.81-.37.89-.69a7.82,7.82,0,0,1,.9-2c.35-.57.49-1,.43-1.16s-.1-.36-.14-.54a16.17,16.17,0,0,1-.8-5.11c.38-1.9.64-3.23.77-4a4.52,4.52,0,0,0,.09-1.46c-.06-.2-.15-.28-.26-.23l-9.74,4.17q-5.62-2.43-8-3.21c-.5-.17-1.2-.39-2.12-.65" transform="translate(0.16 -2)"></path>
              <g class="cls-13">
                <rect class="cls-14" x="30.91" y="57.33" width="20.45" height="18.31"></rect>
              </g>
              <g class="cls-15">
                <rect class="cls-16" x="32.24" y="57.66" width="18.87" height="15.13"></rect>
              </g>
              <path class="cls-17" d="M36.8,64.05s0,0,0,0l0-.05,0,0a7.07,7.07,0,0,0-1.26-1.47,14.79,14.79,0,0,0-2.77-1.85,4.26,4.26,0,0,0,2.82,3.25,4.76,4.76,0,0,0,1.24.19h0Z" transform="translate(0.16 -2)"></path>
              <path class="cls-18" d="M36.61,63.53a1,1,0,0,1-.08-.14,5.16,5.16,0,0,0-1.18-1.46,6.26,6.26,0,0,0-2-1.28c-.34-.12-.56-.14-.66,0a14.34,14.34,0,0,1,2.76,1.85,7.11,7.11,0,0,1,1.27,1.47l0,0,0,.05s0,0,0,0,0,0,0-.12a.14.14,0,0,1,0-.06s0,0,0-.06,0,0,0-.05,0-.07,0-.12a.39.39,0,0,1-.06-.11" transform="translate(0.16 -2)"></path>
              <path class="cls-9" d="M33.52,63a13.37,13.37,0,0,1-.82-1.83.94.94,0,0,1-.08-.35,4,4,0,0,0,.14,1.06,9.53,9.53,0,0,0,.62,2,2.09,2.09,0,0,0,1.71,1,3.66,3.66,0,0,0,1.75,0c.26-.13.31-.33.18-.61s-.24-.43-.27-.47a.14.14,0,0,0,0,.06c0,.14,0,.18,0,.12h0v0c-.1.34-.52.42-1.24.24a3,3,0,0,1-2-1.31" transform="translate(0.16 -2)"></path>
              <path class="cls-19" d="M32.7,61.2A13.37,13.37,0,0,0,33.52,63a3,3,0,0,0,2,1.31c.72.18,1.14.1,1.24-.24v0h0a4.76,4.76,0,0,1-1.24-.19,4.26,4.26,0,0,1-2.82-3.25h0s0,0,0,0a.32.32,0,0,0-.06.22.94.94,0,0,0,.08.35" transform="translate(0.16 -2)"></path>
              <path class="cls-17" d="M46.16,64.26s0,0,0,0l0-.06a0,0,0,0,1,0,0,7.28,7.28,0,0,1,1.24-1.5,14.13,14.13,0,0,1,2.72-1.92,4.3,4.3,0,0,1-2.74,3.32,5.76,5.76,0,0,1-1.24.22h0Z" transform="translate(0.16 -2)"></path>
              <path class="cls-18" d="M46.34,63.74l.07-.14a5.44,5.44,0,0,1,1.15-1.49,6.18,6.18,0,0,1,1.95-1.32c.34-.14.56-.16.67-.06a14.13,14.13,0,0,0-2.72,1.92,7.28,7.28,0,0,0-1.24,1.5,0,0,0,0,0,0,0l0,.06s0,0,0,0l0-.12a.14.14,0,0,0,0-.06.14.14,0,0,1,0-.06s0,0,0,0l0-.12a.67.67,0,0,0,.06-.12" transform="translate(0.16 -2)"></path>
              <path class="cls-9" d="M49.42,63.17a13.31,13.31,0,0,0,.77-1.86.86.86,0,0,0,.07-.35A4.09,4.09,0,0,1,50.15,62a9.14,9.14,0,0,1-.57,2,2.13,2.13,0,0,1-1.69,1.09,3.88,3.88,0,0,1-1.75.09.4.4,0,0,1-.19-.61,4.91,4.91,0,0,1,.26-.48.14.14,0,0,1,0,.06l0,.12h0v0c.11.34.53.41,1.25.21a3,3,0,0,0,2-1.35" transform="translate(0.16 -2)"></path>
              <path class="cls-19" d="M50.19,61.31a13.31,13.31,0,0,1-.77,1.86,3,3,0,0,1-2,1.35c-.72.2-1.14.13-1.25-.21v0h0A5.17,5.17,0,0,0,47.44,64a4.26,4.26,0,0,0,2.74-3.31h0a0,0,0,0,1,0,0,.34.34,0,0,1,.06.22.86.86,0,0,1-.07.35" transform="translate(0.16 -2)"></path>
              <path class="cls-20" d="M36.63,63.58a4.61,4.61,0,0,0-.81-1.18,3.26,3.26,0,0,0-.47.75c.58-.17,1,.09,1.15.81a1.71,1.71,0,0,1,.13-.38M47,64.15c.26-.92.62-1.31,1.09-1.16a6.71,6.71,0,0,0-.59-.84,5.58,5.58,0,0,0-.74,1.3A3.05,3.05,0,0,1,47,64.15Z" transform="translate(0.16 -2)"></path>
              <g class="cls-21">
                <g class="cls-22">
                  <image width="74" height="62" transform="translate(33.04 57.21) scale(0.24)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEoAAAA+CAYAAACMY42mAAAACXBIWXMAAC4jAAAuIwF4pT92AAAFt0lEQVR4XuWazW7bRhSFzwwpO7GBehMvC9jLvkIXjf1eReMkfqsuLLtv0E1RdGEjaRdFs4lsUSTn53ZxZyhK4q9ESRTzATQNa2TSZ869cziyICLCt8Tkgc/f/VQ9bomwbsAg+HzLAn19mP/sx7h8fAHDFOrz7eK5iMlDK1cNQyjvlmXXVPH1WxGqiWuqmDQU1CEOppmv45o6WvSpfjuqqAl3yedb4Puf60YB6JtQXpR1y2mL7L/0tu2aOhqW3+4dtWkT7pqGMWH7Qm2jCXdJw5iwHaH65poqGsaEbnpU311TR4M+tbaj0j8/Ikx+g3w5QGGWaRATGgsVPY0Rf7rH9PcPeH0m8epMIDiTwKjuncOgsvS+3L3H9GmM6HEMAAiOBF6fCbw6k9k5PCp794FRU34Ljvpy9x4A8N/dTdFYwAJkAbIEsgJkCIAoHjswwmXXVEHkhQLI8Hkw1PQp2VQkACAiWMMiWeO+33zN7Ac1MUGeXlxVDsjDTmKBrAGsJpCpe9eBUBNr5Mnl28oByxjNAlntxDJDsRQqXSVPWjgKYHGMAowidx5Q+VW4SgLA+fVN6YBlyBCMJhgNmJRg0gGVX8Ujlyx9pQQiwKROJOcqnQ7DUlWVIQHgzfW78hEFWE1OLEAn7Cqr697Vf0xKUH99LHwtc9TJ5VXhgCKsYRfpxB8sGA7YWNYAKgaSf+4LX8+EahMTAFafBQJUTFAJ966DhHiidUyYfRoXDsk5ql1MsAZQCUHFfAEdE9TsMNO6TgkqIqgZQcdA/Peqq+ZCtXQU4FwVs1hqBqgZX+yQ4oJRhDQipO7e1YwQPY1Xxi2sem1iAsDu0Usi8awcRr+yGkijuZtSd/z7683K2Mb7UWUYzT1KBoAIACHBGwoCGL3q786C1UA6tUinzlFOsLJJXnBU25jgMYmzbrR4UdVTZxlFSKYWyZRYqClBTV3bcD3Wbzl5VgJnm5jgIQL0jOazMyUkL4T0hcXqTYN3q1s65XvzIvnJtbknjOlSn1oRqm1M8BBxCeYvnnjBov0HUrJAOuP7iZ/dveUcZZcew5a3ngoc1S4m5CELLr+co5Jn/j55sdDxHlZE4uU/eZ4f+fsqEsmTX/1Wmvk6MSEPEbJaJ79vZQhGCRgFjBQQHAPBSEBss9cTLzQ+SCp3aLdCp251rpq46PE+06PwobhtTFjGl6F3Un4244lFMuFZ1Un3/Yusc9ALXyueEOJJ7vrPFrHvnTXunlY5qkuMcruhyu9hAWEKhAkQHhOCI4FgBAQjQI4ERwyJVk7z+/h8Hb9HRvNHLH/2jmoxOfk+Vfpx1R+/tLjbBshQIDwGwmOB8FggOAJCJ5QMnWAhIAKRy2SuPAVHMwJ/YXFoobSt5onwOxtaEUwmFB/rLCjn1zd4c/1uu47KYzUhNfwQ7d0UjghyJBCMCEEoIENABgQRCAgJSEksUm7OiAAQYK13EgtABryhqNhZ2u2Z6dRtV2+4iJQ66svd+/LP9zpABnAiYS5SyG7KSlCKzE3eUt5V1jmKLNz+Pc0d5c5lq1lbfvhA5Y46uXwL3JW9ujm+ZHTCzpGBgAxzbgoAISgrPQ+50oN1rvKfCum5eF0TPY0rhNowJjSG5qIh5R9kDV2IuZty49lVLoJsWFJNiB7vq/fM13mc6YJsFdPugwyVOzRlZbULkQCOCZVCrfs4MzROL67q/5Gs65hwCJxcXuH04gonl2+zFrSzeNB3/NNI2VZTrVDn1zdbjQn7wrum6R5crVDbjgm75Pz6ZqGc2lAv1Bq/tC+0dU0VtUIBfMGm/0O1T4qacFc0Eur0or9C1TXhrqiNB56+xIRtuqaKRo7aN7tyTRWNhdplTOiyCXdFY6G2HRM2Wbp3QXOhOv4D+uiaKhoLBWwWE/bVhLuilVBtY0IfmnBXtBKqrk8dumuqaCdUwR8/JNdU0ThweqKnMaLH+8ELs8z/91VhJczha98AAAAASUVORK5CYII="></image>
                </g>
              </g>
              <g class="cls-23">
                <rect class="cls-24" x="57.81" y="45.74" width="17.54" height="10.48"></rect>
              </g>
              <g class="cls-25">
                <rect class="cls-26" x="7.8" y="44.06" width="17.88" height="10.87"></rect>
              </g>
              <g class="cls-27">
                <rect class="cls-28" width="27.36" height="44.53"></rect>
              </g>
              <g class="cls-29">
                <rect class="cls-30" x="57.45" y="2.94" width="27.82" height="43.26"></rect>
              </g>
              <g class="cls-31">
                <rect class="cls-32" x="18.54" y="28.77" width="9.05" height="15.75"></rect>
              </g>
              <g class="cls-33">
                <rect class="cls-34" x="5.16" y="25.39" width="12.13" height="17.14"></rect>
              </g>
              <g class="cls-35">
                <rect class="cls-36" y="18.68" width="14.63" height="15.54"></rect>
              </g>
              <g class="cls-37">
                <rect class="cls-38" x="1.33" width="14.61" height="19.08"></rect>
              </g>
              <g class="cls-39">
                <rect class="cls-40" x="56.9" y="30.42" width="8.26" height="15.79"></rect>
              </g>
              <g class="cls-41">
                <rect class="cls-42" x="67.78" y="27.58" width="11.23" height="17.37"></rect>
              </g>
              <g class="cls-43">
                <rect class="cls-44" x="70.2" y="2.94" width="14.18" height="18.49"></rect>
              </g>
              <g class="cls-45">
                <rect class="cls-46" x="70.69" y="21.43" width="14.59" height="16.01"></rect>
              </g>
              <g class="cls-47">
                <g class="cls-48">
                  <g class="cls-49">
                    <rect class="cls-50" x="57.58" y="5.31" width="18.91" height="30.24"></rect>
                  </g>
                </g>
              </g>
              <g class="cls-51">
                <rect class="cls-52" x="14.24" y="46.34" width="11.04" height="4.9"></rect>
              </g>
              <g class="cls-53">
                <rect class="cls-54" x="7.88" y="44.06" width="17.37" height="7.86"></rect>
              </g>
              <g class="cls-55">
                <rect class="cls-56" x="58.21" y="47.75" width="10.76" height="5.67"></rect>
              </g>
              <g class="cls-57">
                <rect class="cls-58" x="58.3" y="45.76" width="16.9" height="8.72"></rect>
              </g>
              <g class="cls-59">
                <rect class="cls-60" x="33.06" y="68.47" width="16.96" height="4.18"></rect>
              </g>
              <g class="cls-61">
                <rect class="cls-62" x="30.03" y="30.2" width="25.71" height="13.78"></rect>
              </g>
              <g class="cls-47">
                <g class="cls-63">
                  <g class="cls-64">
                    <rect class="cls-65" x="10.44" y="2.48" width="16.44" height="31.54"></rect>
                  </g>
                </g>
              </g>
              <g class="cls-66">
                <g class="cls-67">
                  <g class="cls-68">
                    <rect class="cls-69" x="0.65" y="25.52" width="25.82" height="18.67"></rect>
                  </g>
                </g>
              </g>
              <g class="cls-66">
                <g class="cls-70">
                  <g class="cls-71">
                    <rect class="cls-72" x="57.61" y="29.09" width="26.75" height="16.68"></rect>
                  </g>
                </g>
              </g>
              <g class="cls-73">
                <rect class="cls-74" x="26.05" y="39.11" width="10.8" height="9.05"></rect>
              </g>
              <g class="cls-75">
                <rect class="cls-76" x="27.15" y="39.58" width="7.55" height="8.16"></rect>
              </g>
              <g class="cls-77">
                <g class="cls-78">
                  <image width="42" height="43" transform="translate(27.04 38.25) scale(0.24)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAArCAYAAAAOnxr+AAAACXBIWXMAAC4jAAAuIwF4pT92AAAEa0lEQVRYR7WYv4/cRBSAv5nxz10qrgBdKAJSEonukoicRHOHgqIgHT0NBZGokCgSau4PyCEkLg0dNGkoEOkouEOKSA4JIUJ1B4ggAQVSrsjueu2xPUPh3b1fvrW963yStavdmfG3b+z3nhf7DNj7Zr1qSGMkLbOzscpv99bZ2VitGtqIVkV3NlZ5srsNwJPd7VZlWxM9LDmmTdlWRMskxzzZ3WZ/r/y7JswtOk1yzMPbq3PLziy6v7ddS3LMvLLCWmurBh1nf2+bh7dnu/aWb23x/PmVqmEnaBzReSRh9sg2Ep1XcswssrW3vi3Jw7z1ea1TAzUj+iwkgUY5tlL0WUlCs4IwdeubpJ95WLiwwpWbW1PHnCq6s7HK/t73SCFRUqKUQgiBFAJrLRYwxpCbnNwYjDFly9SmSrZU9MdP3uDp7/fxXBdHOThKoaRCSoEQAgBrLcZYcpOT5RlplqGzlCzPqXl/nmCa7AnRnz59k+jxAzzXxXOKw1EOSkmkkMdEDZnJybIMnWXoTJNoTZJqsjwvPWEVp8keEf3ls2tEj3cIPJ/A8/BdD9dxJlGVUiI4EC2iWURUZxk61cQ6IdYJwyRBZ+lM0T23ts65tY+PfDYRfbR5neSvHcIgGIn6+K6H57i4jjORPBzRQtaQ5ilJmqK1Jk4LySiJGcZD4lTPJHu81Ir93W37aPM63SCkE3ToBAHhIVEpKzMYALnJibUmThKGOiZKYgbxkGgYtSKrrnF3vRuEdMMu3SAYCYcEnj+JXh2kkLiOU2QHBEIAo+yQj7JDU/7+4QsWLqwQLpxFvvDqVcIgoBMEdIKQbhDiOW7VGqUIBL7rFWv5AWEQEno+oeejpKqaXsq4LxDWWvvPl+/g/Pcr3bAzs+RxYp3QH0b0hwN6UUQv6hMlcdW0U5EAZ969y3OvvN6aJIDvesV17vn4nofveSjVPKoLF1ZYvrV1ND1l9z7A/PvztHmNSPOMXjSgN+jzNOrzdNBnqJOqaRMO59Qjt7SztolcXCqdNAuOUkV6c11cpzjq3qDHE/+J3OOsbR7/aGYEYlQwVFGGlUKK6nRXVp1KZ7ktyiqpcKSDkqpobiry8mkltHSWWFxqTVYKgZTjQ07d+mlNyak/ry1ZIcSoPZST92VUtXlT96EN2aI2HbyWsXxrq7Jxrryy55W19qCBscaeqPl1n/MrRWE+2XGHZYzFWIOxB08CdSWhpigUsuryjaphJ8jyjHzUs+Ymx5giok0koYEogLr0XqOCYK0lzTPSPCsa7CzHWNNYEhqKQrPqleYZOk3RWUqaFcJXbn7XWBJmEIV6ssbayfOTTlM6Z5dZ+vDbmSShwV86ZZzWxFgscZLQG7V5cvEi59//umSF+swU0TFlkbUUkYzimDiJcV+6PLckzBnRMePIFtudEMUxUTJELl7k5RtfVU2vRSuiAP07r5FozVAnxEmMOnOpNUmYc+sP4719h95wQH84QCwutSoJLUYUYPDnA3p/3OfFqx9VDW3M/wRKGhUyeBFSAAAAAElFTkSuQmCC"></image>
                </g>
              </g>
              <g class="cls-79">
                <g class="cls-80">
                  <image width="32" height="32" transform="translate(28.48 39.45) scale(0.24)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAC4jAAAuIwF4pT92AAAEM0lEQVRYR6WWTWhcVRTHf/fOezOTtJ2WZKHdqMWmAQVtobTSZpK0TUttiAvRRUFRQQSxrqqLFCOUohFs3blx6ULEpSVFqDaZZoRkVSoI2m5cCc1X22S+33v3uLiT6UzmvfmIfzjM3HfPeed//+/cey7yP3F3MSOn9jvy4Zsn27mGgnYOrXB3cU5G9jlyaG9M9vdpef3saLuQJmybwOQ7YzK8z5GXntLy7G4lfUkk5SLzmdl2oQ3YFoGp98bkxPOOHNwbk2dSSvbEbfJN64aEEhGhQ9y/c5sr759mOS+s5gyrBeFhwRCYZt/Hlc5eq9s5bOLW91/wzUdnKHhQqAj5ipArS2hygPHTJ8IntqAjBX68dJY7CxmWNoTlnGEpZ1jO2dW3ih4aGWXm5my0A20UWPlrnpnLr/LPH/N4AXiBUPah7EPJk5bJAbKZObK351r6RBJYu5fl96/H+ffPefxA8APwjCVhLSqyEeNjJ1qSCCVw//o0C1fPYYSaBQKBqf43YNotvw7TVy5HzjURWLw2zv3r07WxVC1q3AmymbnIoqwRWLuXZfHaOKt/zzc4qKptHdc/6wTZzBxfhSihRETW7mVZuHquadILYClneLBuWNoQHuQMS+uGBznD8oZQCbrVAmZ+nWVoeLQ21lHJAbSCmFY4MYUTA1eDE1PEYwo3FhrSFluLUvcdGIp01somdWPW4o4i4UDcgYSrUN1+hyrqi1IDvPLJjVBHpSDhQMJRJKvJk66i11X0uvb5dlBflBqg78AQAxOToc42OSRd6HEVvXHojSt2xBU7Ewqn48O8EZuHVMNRHLYLBHhUEFbyhpWc/V3NC6t5w1q1GT0uCSaiJ0RBK9iVVI3nwNGLM/QPphscFU9WvCMBOxOKXQlFKqnYnVTs6bHWTVE6GlI9ilMnR3G2Tg5MTDapEHds4rKv8QKDH0AgyvYCpdFacLXtkCXPdsiwDRrTkHQUvQnFDz/f4sjxkfBuGLY1AwMPi1byhwXhUVF4VDSsl4SNkpArQ8ETihWhUm1cpvpmrcDRirgDx4dHufDp5xw+NgLQrADYouwfTDcoEdOQSirM5soBrTSuFuIxIekKxQoU44pKIPhG1epCayv7kWMjfPvTbw25Wt4Hwoqy4sPjki289aKwUbbSFypQrAgl33ZKv9q4wG7nty5M8fbHU0052l5IbnyQanrmBbBRFtZLQr5GQCh5UA6eEBAjCHDpu5u8cHi4+eV0QCDqqDZir2a5zdV7tgArvv3+gYHnXk5z5t3PGDgUnhw6IADRJMCqUfKEogdl3xagHwhPv5jm/Je/hMbUoyMCEF4P9QgMtWvb4GuTHHzjUqRvPTomAO1JgO0rrRrcVnR1kkf1C4D+wXTXyaFLBSC8HvoH0xy9OBMR0RpdKQDNnXNgYnLbySHiJGyHTQL9g+muJd+K/wDh0OLDQuzT3QAAAABJRU5ErkJggg=="></image>
                </g>
              </g>
              <g class="cls-81">
                <rect class="cls-82" x="46.99" y="39.64" width="11.13" height="9.14"></rect>
              </g>
              <g class="cls-83">
                <rect class="cls-84" x="49.37" y="40.13" width="7.6" height="8.45"></rect>
              </g>
              <g class="cls-85">
                <g class="cls-86">
                  <image width="42" height="42" transform="translate(46.96 39.21) scale(0.24)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAACXBIWXMAAC4jAAAuIwF4pT92AAAEg0lEQVRYR7WYPWwcRRxH3+zs7Oyuk4AcKYWFQpQQB4nKJFKMwoeNhBQhGSFRUBMCQqlASZWGpKNwBEWqiIIeQUGAAgR2AZIjEH1skYZUiLggie/2Y3Yo9m7vbO/d7u0ez1qd1jczev7P/GZnjZ0SG6tL9rv3sA/urlU1bYTDFLhzY5kHd9cB2FhdZntzfWz7JrQW3d5cLyT7bKwuc+fGcnmHhrQS3d5cZ2O1XOjB3fWpyjYWHSfZpy87jaUgrLW2qlEZw+uyDotX1pidX6pqNpJGFZ1UEtqHbOKKNpEc5vCpJc5eXqtqto+JKlqW8ElpGrLaonXCU5cmIas19dOU3EvdkNWq6Nbt61VNGlM3ZJUVbRseACEEQggcIRAIEIAFiyWzFmsts/OvjA3ZWNG2ktKRuK5ESRdXSqQjEUIU31trMZnBmIzEpBw6cY4zH/1UOtZI0TbrUjoSrRSe8vCUQkkXKSVuiWiaGYwxJCYlSRNmjr3A0fNXefLky7vGLBVtKimEwFMKX2l8rdFuLqvcQUUd4RRTn9kMkxlSY0jSlDhNiJOYbhzz3KVveeKZlwZj7xVtIxl4msAPCDyN72m056ELUbeoqBBg7WDq82qmxElMlMR044hOFPHsB99w6MSL+fh7Rb9/fzA1dRFCEGqfUAeEfkCgdS6rNZ7y9k35XiwWYwxRkhDFEZ04ohN12el2OPLqZY6ev4o73KHJE6NfyVD7hH7ATBAQ6lzWUypPedUYCNz+OpYSKXtLBMHfP98AGIg2TbjnKvwhyRk/r6qSu2pQC4FAKy/fHXp/YHhscVDRrdvXG0k6joP2vHxtar+oahPJYVwpCX2fDMuRC18C4GxvrrN1+9r4niPwXIWvPHydh8f3/NaSfVzpcvjtLwb3TRIOeTW93l6p3TzdWqmqbrVRKzcRcwvFvbN4ZfKzIYB0HDxX5ZdSaM8bm+xJkGfe3SUJ4MzOL7F4ZY3Dp5bKe43AlfneqFy32NCngTO3gDx9Yf/vAWbn81N3XVkhBO7QVuJKt7edtMOZW8BduVn+3fBNXVmBwHGc/BL55zQYJQkl59Gzl9eoXLeiJysE0nFwprA21RhJGHFw7q/bUQjy5/XwfRv2JryMkXM2TtZii0NF/6cpZQkvY+zimp1f4vVbdt+6tdaS2YzMWrIsI8uy8gEqGJXwMmqlYG/IbE/QZAaTZaSZocY74i7GJbyMWqKQy55cuVbcp8b0rpQ0zYUnYRJJmEAU4OTKx8W6zQXT4mSepElF7wFVCS9jIlEYhMxkWe/VIemdzBNSY6q610p4GZWvy+P447PXSO7/zoFwhoPBDAfDkFAHI5/5TSWhQUWHef7DHwmOLRLFEd24SyeK6CZx6XblzC00loSWFe1z/4dP+GftUw4EYX7S9wN8TxeVnTThZUxFFODhvV+59/lbzPgBge8TeD6+p1FPnUG90U4SWk79MAePn+P4xa941NnhUWeHhzuPedh5jDj9TlXXWkytosNs3XqT+K/fOH7xa4Knz1Y1r8X/Igrw75+/FP88mAb/AeBXk19yJiQVAAAAAElFTkSuQmCC"></image>
                </g>
              </g>
              <g class="cls-87">
                <g class="cls-88">
                  <image width="32" height="32" transform="translate(47.68 40.17) scale(0.24)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAC4jAAAuIwF4pT92AAAEB0lEQVRYR62Wz2scZRjHP887P3Zmd3Y32c0P/C1CEvAXHsSGNsFootSEiIeC4EEPQi+9CA1qECFtSuMhFfTgQcGDInhQRKWRgmB2u5aUBKzUIunFvyAePEiaZPf18M5sd7OT2R/4gZcZmPd5n+98n/d9ZkRrremSM69Ok7KFD7/6ud3U9ugu+bW8rkcKSj91j6UnH7b1jY31diGJdCXgaukXnXPQBQ/9QE70Y0NKH3/Q1l9+fL5d6JF0JWB2ZkrnHHTOQedd9L2B6EeHlD7xkK3ffX1a39ostVuihY4FrJxfqidvFHFfVvSTw0pPPWLrU0+4+s+t7kSI1u03YaW8ztzMc7HPLAV9vmIgIwwEisFAeObEFGc+uhI7/zAdCci7kvjcc4TBQBgMFIOBYigQBrOKN1evcP/jk4mxKvEpMPdC/Js3slfV7O7D7j7cOdDcqcLeAXz7/klufncxMTZRQKW8TqW0njQFgFrNJN6ravarhENzUIMb36ywsTrH37crsbGJJWhnfSNpVxjOKoayiuGshFczihlBCYwvrFEYnWiKO9KBTqxvpKbN0A3X+n04Z2N1luuX5priYgV8sHyuI+t7YWf7Kmunc/WStJQg6cgl0UkJDjO+sNbqwMryudaZHeBYYCuwLbCVYCvTIywFkrCVmgT0ar2lIGULri24lhHjWIJjGSFx+YtjkxRGJ+6WoFfrwdg/kAkbUVYxFHbEofDec1pjZj/9B2hwoNfkloKMK6TD4TuCZ5vumLIFx2qNGV9Yq98rgJdf7C25EghSUh9pV0g74EdCHCOwkcj6+hpb10rc3CxhxyhNQgkEnpD3hZwnZD0hmxIy4Ui74NvN1S+OTXLs7OXmdZ4+/ixvv7dEv6/wHEncsWB2tGsLfb5Q8IU+X9HnC/kGEYErZFzBtZtjR+YXW9eLNuHWtRJvvPI8/+7D7r7p6TWt611MidnRngNpxyQIUsaBfOhEf1pRSAuFjKLflyb7R+YXkwVEnD41zUalxH5VU62ZVipiaukoIWWD75h6BynIeqYEeU/Rlxb6faGQVk1vH2d9ROzH6LeNEm+9NkO1Zvo5ApaY8+3agu8YEZELuUiEb0rjO811jI5cHEd+Df/YLPP1J8vc2iwjGAdsBa5tmo4RAJmUqX0uFOIdSh73BWyk7R/R959d4KfPL4QCzLlOhS6k3bsuBKnWM59kfURbAQB//V7mi3dOYivTYlM2eKELadeUI+70JFkf0ZGAiB+XXmJnu4IbCnAtUEf8UbSzPqIrAQA72xWuX5pNnHPUkYuj7U/pYYpjE4wvrFEci//bLY5NdpwcehAAUBid4NjZy7GJukkOPQqIGJlfbPqyjcwvdlT3JvT/xO0fLrabEst/bBs6vY8djGUAAAAASUVORK5CYII="></image>
                </g>
              </g>
              <rect class="cls-89" x="105.46" y="13.72" width="14.49" height="57.62"></rect>
              <path class="cls-89" d="M161.39,36.57c-2.92-3.11-6.82-4.62-11.7-4.67-8.62-.09-12.26,3.5-15.4,6.48l-9.7-6.48V73.34h14.49V51.43a6.18,6.18,0,0,1,1.68-4.5,5.84,5.84,0,0,1,4.38-1.73,6,6,0,0,1,4.42,1.73,6.09,6.09,0,0,1,1.73,4.5V73.34h14.48V49.08q0-7.83-4.38-12.51" transform="translate(0.16 -2)"></path>
              <path class="cls-89" d="M213.68,15.72H199.19V35.77a15.13,15.13,0,0,0-10.78-3.87,18.77,18.77,0,0,0-14.53,6.23A21.53,21.53,0,0,0,168.21,54a20.58,20.58,0,0,0,6.21,14.72c5.05,5.41,13.93,5.75,13.93,5.75,5.47,0,10.08-.53,15.94-5.75l9.39,5.92ZM196.44,60.21a8.44,8.44,0,0,1-11.62-.08,8.78,8.78,0,0,1-2.4-6.57A8.69,8.69,0,0,1,184.86,47a8.08,8.08,0,0,1,5.81-2.36A7.94,7.94,0,0,1,196.44,47a8.9,8.9,0,0,1,2.4,6.65Q198.84,57.94,196.44,60.21Z" transform="translate(0.16 -2)"></path>
              <rect class="cls-89" x="218.95" y="31.78" width="14.49" height="39.56"></rect>
              <path class="cls-89" d="M259,44.75q4.56,0,7.91,4.78l10-6.73a19.27,19.27,0,0,0-7.2-7.92A20.26,20.26,0,0,0,258.84,32a21.86,21.86,0,0,0-15.69,6.11,20,20,0,0,0-6.39,15.09,20,20,0,0,0,6.39,15.08,21.86,21.86,0,0,0,15.69,6.11,20.25,20.25,0,0,0,10.92-2.91,19.29,19.29,0,0,0,7.2-7.93l-10.2-6.44q-3.3,4.5-7.75,4.5a7.57,7.57,0,0,1-5.83-2.35A8.55,8.55,0,0,1,251,53.16a8.57,8.57,0,0,1,2.18-6.07A7.6,7.6,0,0,1,259,44.75" transform="translate(0.16 -2)"></path>
              <path class="cls-89" d="M305.55,33.81V56.06a6,6,0,0,1-1.73,4.42,5.86,5.86,0,0,1-4.33,1.72,5.89,5.89,0,0,1-6.15-6.14V33.81H278.85v22.7a25.32,25.32,0,0,0,.56,5.42C281,69,285.8,74.11,294.11,74.72c3.77.27,10.93.08,16.51-5.93L320,74.72V33.81Z" transform="translate(0.16 -2)"></path>
              <rect class="cls-89" x="218.95" y="13.72" width="14.49" height="13.55"></rect>
              <path class="cls-89" d="M355.57,38,349,46.43A13.12,13.12,0,0,0,340.5,43q-2.82,0-2.82,1.53a1.41,1.41,0,0,0,.32.89,2.3,2.3,0,0,0,.85.64c.35.17.87.38,1.57.65l4,1.61a28,28,0,0,1,8.91,5.16,9.91,9.91,0,0,1,2.86,7.49,11.69,11.69,0,0,1-4.68,9.8q-4.67,3.58-12,3.58-11.44,0-17.32-7.73l6.44-8.23q5.16,5,11.13,5,3.54,0,3.54-1.77c0-.7-.78-1.37-2.34-2l-4.51-1.85a26.07,26.07,0,0,1-8.82-5.32,10.4,10.4,0,0,1-2.87-7.65,11.26,11.26,0,0,1,4.28-9.35Q333.32,32,340.42,32q9.43,0,15.15,6" transform="translate(0.16 -2)"></path>
              <path class="cls-89" d="M362.8,30.34h1.31a2.2,2.2,0,0,0,1.29-.27.91.91,0,0,0,.34-.74.88.88,0,0,0-.16-.53,1,1,0,0,0-.46-.35,3.33,3.33,0,0,0-1.09-.12H362.8Zm-1.08,3.77V27.42H364a5.4,5.4,0,0,1,1.71.19,1.6,1.6,0,0,1,.85.64,1.72,1.72,0,0,1,.31,1,1.74,1.74,0,0,1-.53,1.28,2.06,2.06,0,0,1-1.39.61,1.74,1.74,0,0,1,.57.36,7.38,7.38,0,0,1,1,1.32l.82,1.31H366l-.59-1a5.38,5.38,0,0,0-1.14-1.56,1.4,1.4,0,0,0-.86-.23h-.64v2.84Zm2.73-8.63a5.26,5.26,0,0,0-2.55.67A4.87,4.87,0,0,0,360,28.07a5.27,5.27,0,0,0-.7,2.61,5.2,5.2,0,0,0,.69,2.58,4.88,4.88,0,0,0,1.93,1.92,5.19,5.19,0,0,0,5.17,0A4.86,4.86,0,0,0,369,33.26a5.2,5.2,0,0,0,.69-2.58,5.38,5.38,0,0,0-.7-2.61A4.81,4.81,0,0,0,367,26.15,5.28,5.28,0,0,0,364.45,25.48Zm0-1a6.38,6.38,0,0,1,3.07.81,5.77,5.77,0,0,1,2.32,2.3,6.24,6.24,0,0,1,0,6.22,5.71,5.71,0,0,1-2.31,2.31,6.27,6.27,0,0,1-6.2,0A5.71,5.71,0,0,1,359,33.77a6.24,6.24,0,0,1-.82-3.09,6.34,6.34,0,0,1,.84-3.13,5.8,5.8,0,0,1,2.33-2.3A6.37,6.37,0,0,1,364.45,24.44Z" transform="translate(0.16 -2)"></path>
            </g>
          </svg>
        </a>
      </div>
      <div class="menu--action__icon--wrapper_mobile">

        <div class="icon__search header-search">
          <a class="elementor-button elementor-button-link elementor-size-sm" href="#!">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
              <g clip-path="url(#clip0_6_107)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0509 13.153C13.167 13.0368 13.3049 12.9446 13.4566 12.8817C13.6084 12.8188 13.771 12.7864 13.9353 12.7864C14.0995 12.7864 14.2622 12.8188 14.414 12.8817C14.5657 12.9446 14.7036 13.0368 14.8197 13.153L19.6322 17.9655C19.8667 18.1999 19.9985 18.5178 19.9987 18.8494C19.9988 19.181 19.8672 19.4991 19.6328 19.7336C19.3984 19.9682 19.0804 20.1 18.7488 20.1001C18.4173 20.1002 18.0992 19.9686 17.8647 19.7342L13.0522 14.9217C12.9359 14.8056 12.8437 14.6678 12.7808 14.516C12.7179 14.3643 12.6855 14.2016 12.6855 14.0374C12.6855 13.8731 12.7179 13.7104 12.7808 13.5587C12.8437 13.4069 12.9359 13.2691 13.0522 13.153H13.0509Z" fill="#333333">
                </path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.125 15.1003C9.02784 15.1003 9.92184 14.9225 10.7559 14.577C11.5901 14.2315 12.348 13.7251 12.9864 13.0867C13.6248 12.4483 14.1312 11.6904 14.4767 10.8563C14.8222 10.0222 15 9.12818 15 8.22534C15 7.3225 14.8222 6.42851 14.4767 5.59439C14.1312 4.76028 13.6248 4.00239 12.9864 3.36398C12.348 2.72558 11.5901 2.21917 10.7559 1.87367C9.92184 1.52817 9.02784 1.35034 8.125 1.35034C6.30164 1.35034 4.55295 2.07467 3.26364 3.36398C1.97433 4.6533 1.25 6.40198 1.25 8.22534C1.25 10.0487 1.97433 11.7974 3.26364 13.0867C4.55295 14.376 6.30164 15.1003 8.125 15.1003ZM16.25 8.22534C16.25 10.3802 15.394 12.4469 13.8702 13.9706C12.3465 15.4943 10.2799 16.3503 8.125 16.3503C5.97012 16.3503 3.90349 15.4943 2.37976 13.9706C0.856024 12.4469 0 10.3802 0 8.22534C0 6.07046 0.856024 4.00383 2.37976 2.4801C3.90349 0.956366 5.97012 0.100342 8.125 0.100342C10.2799 0.100342 12.3465 0.956366 13.8702 2.4801C15.394 4.00383 16.25 6.07046 16.25 8.22534Z" fill="#333333">
                </path>
              </g>
              <defs>
                <clipPath id="clip0_6_107">
                  <rect width="20" height="20" fill="white" transform="translate(0 0.100342)">
                  </rect>
                </clipPath>
              </defs>
            </svg>
          </a>

        </div>
        <div class="menu--action__icon" id="menuIcon">
          <div class="menu--action__line menu--action__line--top"></div>
          <div class="menu--action__line menu--action__line--middle"></div>
          <div class="menu--action__line menu--action__line--bottom"></div>
        </div>

      </div>
      <div class="menu--item__other-page menu--items">
            
            <?php
wp_nav_menu(array(
    'theme_location' => 'header',
    'menu_class'     => 'menu',
    'add_a_class'     => 'menu--item__link',
    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
));

            ?>

          <div class="menu--action__icon--wrapper_desktop">

            <div class="icon__search header-search">
              <a class="elementor-button elementor-button-link elementor-size-sm" href="#!">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                  <g clip-path="url(#clip0_6_107)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0509 13.153C13.167 13.0368 13.3049 12.9446 13.4566 12.8817C13.6084 12.8188 13.771 12.7864 13.9353 12.7864C14.0995 12.7864 14.2622 12.8188 14.414 12.8817C14.5657 12.9446 14.7036 13.0368 14.8197 13.153L19.6322 17.9655C19.8667 18.1999 19.9985 18.5178 19.9987 18.8494C19.9988 19.181 19.8672 19.4991 19.6328 19.7336C19.3984 19.9682 19.0804 20.1 18.7488 20.1001C18.4173 20.1002 18.0992 19.9686 17.8647 19.7342L13.0522 14.9217C12.9359 14.8056 12.8437 14.6678 12.7808 14.516C12.7179 14.3643 12.6855 14.2016 12.6855 14.0374C12.6855 13.8731 12.7179 13.7104 12.7808 13.5587C12.8437 13.4069 12.9359 13.2691 13.0522 13.153H13.0509Z" fill="#333333">
                    </path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.125 15.1003C9.02784 15.1003 9.92184 14.9225 10.7559 14.577C11.5901 14.2315 12.348 13.7251 12.9864 13.0867C13.6248 12.4483 14.1312 11.6904 14.4767 10.8563C14.8222 10.0222 15 9.12818 15 8.22534C15 7.3225 14.8222 6.42851 14.4767 5.59439C14.1312 4.76028 13.6248 4.00239 12.9864 3.36398C12.348 2.72558 11.5901 2.21917 10.7559 1.87367C9.92184 1.52817 9.02784 1.35034 8.125 1.35034C6.30164 1.35034 4.55295 2.07467 3.26364 3.36398C1.97433 4.6533 1.25 6.40198 1.25 8.22534C1.25 10.0487 1.97433 11.7974 3.26364 13.0867C4.55295 14.376 6.30164 15.1003 8.125 15.1003ZM16.25 8.22534C16.25 10.3802 15.394 12.4469 13.8702 13.9706C12.3465 15.4943 10.2799 16.3503 8.125 16.3503C5.97012 16.3503 3.90349 15.4943 2.37976 13.9706C0.856024 12.4469 0 10.3802 0 8.22534C0 6.07046 0.856024 4.00383 2.37976 2.4801C3.90349 0.956366 5.97012 0.100342 8.125 0.100342C10.2799 0.100342 12.3465 0.956366 13.8702 2.4801C15.394 4.00383 16.25 6.07046 16.25 8.22534Z" fill="#333333">
                    </path>
                  </g>
                  <defs>
                    <clipPath id="clip0_6_107">
                      <rect width="20" height="20" fill="white" transform="translate(0 0.100342)">
                      </rect>
                    </clipPath>
                  </defs>
                </svg>
              </a>

            </div>

        </div>
      </div>
    </div>
  </div>
  <section class="header-search-main">
    <?php echo do_shortcode('[header_search_block]'); ?>
    <div class="search-overlay"></div>
  </section>

  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'indicus'); ?></a>
  </div>