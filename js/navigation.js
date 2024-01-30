/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

// Call the function
jQuery(document).ready(function ($) {
  // Check if the div with class "colour-main-outer" exists
  if ($(".colour-main-outer").length > 0) {
    var tl = gsap.timeline();
    var body = $("body");

    // Add a scroll trigger using GSAP
    tl.to(".colour-main-outer", {
      y: -100, // Adjust this value based on when you want the effect to trigger
      onComplete: function () {
        // Add class to body when the div reaches the top
        body.addClass("your-custom-class");
      },
      onReverseComplete: function () {
        // Remove class from body when scrolling back up
        body.removeClass("your-custom-class");
      },
    });

    // Add a ScrollTrigger to the timeline
    ScrollTrigger.create({
      trigger: ".colour-main-outer",
      start: "top top",
      end: "bottom bottom",
      animation: tl,
      scrub: true,
      // markers: true // Optional: add markers for visualization
    });
  }

  // Your existing jQuery code goes here
  // Click event for menuIcon
  $("#menuIcon").click(function () {
    $(this).toggleClass("menu--action__icon--menu-open");
    $(".menu--container").toggleClass("menu--container__active");
  });

   if ($(window).width() < 768) {
 // Click event for Submenu
$(".menu--item-has-children").click(function (e) {
  // Stop the event from bubbling up to the document
  e.stopPropagation();

  // Toggle the class for the submenu of the clicked item
  $(this).find(".menu--item__submenu").toggleClass("menu--item__submenu-active");

  // Close other open submenus
  $(".menu--item-has-children").not(this).find(".menu--item__submenu").removeClass("menu--item__submenu-active");
});

// Close submenus when clicking outside
$(document).click(function (e) {
  if (!$(e.target).closest(".menu--item-has-children").length) {
    $(".menu--item__submenu").removeClass("menu--item__submenu-active");
  }
});
}


});