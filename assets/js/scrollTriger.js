// scrollTriger.js
gsap.registerPlugin(ScrollTrigger);

gsap.to(".flower img", {
  rotation: "1080",
  ease: "power1.inOut",
  scrollTrigger: {
    trigger: "#gsap-main",
    start: "top top",
    end: "bottom bottom",
    // toggleActions: "play none none reverse",
    scrub: true,
    refreshPriority: -1,
  },
});

const boxes = gsap.utils.toArray(".box");

gsap.to(boxes, {
  xPercent: -100 * (boxes.length - 1),
  ease: "none",
  scrollTrigger: {
    trigger: ".scrollTriger-section",
    pin: true,
    scrub: 1,
    end: () => "+=" + document.querySelector(".scroll-wrapper-horizontal").scrollWidth,
  },
});
