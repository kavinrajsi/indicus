// jQuery(document).ready(function ($) {
//   if ($(window).width() > 768) {
//     const tl = gsap.timeline();

//     tl.fromTo(".menu--logo", {
//       transform: 'scale(4)',
//       position: "absolute",
//       top: "-180px",
//       left: '40%',
//     }, {
//       transform: 'scale(0.8)',
//       position: "absolute",
//       top: '20px',
//       left: 0,
//     });

//     tl.fromTo(
//       ".menu--container__wrapper",
//       {
//         ease: "none",
//         opacity: 1,
//         display: "block",
//         position: "static",
//         top: "0",
//         left: 0,
//         right: 0,
//       },
//       {
//         ease: "none",
//         opacity: 1,
//         display: "block",
//         position: "sticky",
//         top: "0",
//         left: 0,
//         right: 0,
//       }
//     );

//     ScrollTrigger.create({
//       animation: tl,
//       scrub: true,
//       trigger: ".header--logo__wrapper",
//       start: "top",
//       endTrigger: ".site",
//       end: "-100% 2%",
//       pin: true,
//       pinSpacing: false,
//       toggleActions: "play none none reverse" // Play the animation on scroll down, but none on scroll up

//     });
//   }
// });