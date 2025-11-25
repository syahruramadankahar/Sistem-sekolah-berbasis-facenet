// SiSkol Custom JavaScript
$(document).ready(function () {
    console.log("SiSkol System Loaded Successfully");

    initializeSiskolComponents();
    setupSiskolInteractions();
    setupSiskolAnimations();
});

// Initialize all components
function initializeSiskolComponents() {
    // Add active class animation
    $(".siskol-nav-item.active").css({
        position: "relative",
    });

    // Initialize scrollbars
    if (typeof $.fn.scrollbar === "function") {
        $(".siskol-scrollbar").scrollbar();
    }
}

// Setup interactions
function setupSiskolInteractions() {
    // Logo animations
    $(".siskol-logo").hover(
        function () {
            $(this)
                .css({
                    transform: "translateY(-3px)",
                    filter: "drop-shadow(0 4px 12px rgba(67, 97, 238, 0.3))",
                })
                .find("i")
                .css("transform", "rotate(-15deg) scale(1.1)");
        },
        function () {
            $(this)
                .css({
                    transform: "translateY(0)",
                    filter: "drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1))",
                })
                .find("i")
                .css("transform", "rotate(0) scale(1)");
        }
    );

    // Sidebar menu interactions
    $(".siskol-nav-item:not(.siskol-nav-section)").hover(
        function () {
            $(this).css("transform", "translateX(5px)");
        },
        function () {
            if (!$(this).hasClass("active")) {
                $(this).css("transform", "translateX(0)");
            }
        }
    );

    // Sidebar toggle buttons
    $(".siskol-sidebar-toggle").hover(
        function () {
            $(this).css({
                transform: "scale(1.08)",
                "box-shadow": "0 6px 20px rgba(0, 0, 0, 0.15)",
            });
        },
        function () {
            $(this).css({
                transform: "scale(1)",
                "box-shadow": "none",
            });
        }
    );

    // User dropdown interactions
    $(".siskol-user-toggle").hover(
        function () {
            $(this).css({
                transform: "translateY(-2px)",
                "box-shadow": "0 6px 25px rgba(67, 97, 238, 0.4)",
            });
        },
        function () {
            if (!$(this).parent().hasClass("show")) {
                $(this).css({
                    transform: "translateY(0)",
                    "box-shadow": "0 4px 15px rgba(67, 97, 238, 0.3)",
                });
            }
        }
    );

    // Dropdown show/hide events
    $(".siskol-user-dropdown").on("show.bs.dropdown", function () {
        $(this).find(".siskol-user-toggle").css({
            transform: "translateY(-2px)",
            "box-shadow": "0 6px 25px rgba(67, 97, 238, 0.4)",
        });
    });

    $(".siskol-user-dropdown").on("hide.bs.dropdown", function () {
        $(this).find(".siskol-user-toggle").css({
            transform: "translateY(0)",
            "box-shadow": "0 4px 15px rgba(67, 97, 238, 0.3)",
        });
    });
}

// Setup animations
function setupSiskolAnimations() {
    // Ripple effect for sidebar items
    $(".siskol-nav-item a").on("click", function (e) {
        createRippleEffect($(this), e);
    });

    // Ripple effect for dropdown items
    $(".siskol-dropdown-item").on("click", function (e) {
        createRippleEffect($(this), e);
    });

    // Loading animation for main content
    $(".siskol-main-content").css("opacity", "0").animate({ opacity: 1 }, 800);

    // Pulse animation for user avatar
    $(".siskol-user-toggle").hover(
        function () {
            $(this).find(".siskol-user-avatar").addClass("siskol-pulse");
        },
        function () {
            $(this).find(".siskol-user-avatar").removeClass("siskol-pulse");
        }
    );

    // Sidebar toggle animation
    $(".siskol-sidebar-toggle").click(function () {
        $(this).find("i").css("transform", "rotate(90deg)");
        setTimeout(() => {
            $(this).find("i").css("transform", "rotate(0)");
        }, 300);
    });
}

// Ripple effect function
function createRippleEffect(element, event) {
    // Remove existing ripples
    $(".siskol-ripple").remove();

    // Create ripple element
    const ripple = $('<span class="siskol-ripple"></span>');

    // Add to element
    element.append(ripple);

    // Get click position
    const x = event.pageX - element.offset().left;
    const y = event.pageY - element.offset().top;

    // Position and animate ripple
    ripple
        .css({
            left: x,
            top: y,
        })
        .addClass("animate");

    // Remove after animation
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Utility function for smooth transitions
function smoothTransition(element, properties, duration = 300) {
    element.css("transition", `all ${duration}ms cubic-bezier(0.4, 0, 0.2, 1)`);
    element.css(properties);

    setTimeout(() => {
        element.css("transition", "");
    }, duration);
}

// Keyboard navigation support
$(document).on("keydown", function (e) {
    // ESC key to close dropdowns
    if (e.keyCode === 27) {
        $(".dropdown-menu.show").prev().dropdown("toggle");
    }

    // Tab key navigation with focus states
    if (e.keyCode === 9) {
        // Tab
        $("body").addClass("siskol-keyboard-nav");
    }
});

// Remove keyboard nav class on mouse interaction
$(document).on("mousedown", function () {
    $("body").removeClass("siskol-keyboard-nav");
});

// Print optimization
window.addEventListener("beforeprint", function () {
    $("body").addClass("siskol-printing");
});

window.addEventListener("afterprint", function () {
    $("body").removeClass("siskol-printing");
});

// Responsive helpers
function checkMobileView() {
    if ($(window).width() < 768) {
        $("body").addClass("siskol-mobile");
    } else {
        $("body").removeClass("siskol-mobile");
    }
}

// Initialize on load and resize
$(window).on("load resize", checkMobileView);
