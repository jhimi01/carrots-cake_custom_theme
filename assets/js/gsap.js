const tl = gsap.timeline();

tl.from(".gsap-container h1", {
  y: -400,
  duration: 2,
  ease: "power4.inOut",
})
  .from(
    ".portfolio-img",
    {
      duration: 1,
      y: 540,
      ease: "elastic.out(1,0.8)",
      display: "none" 
    },
    "+=1.5",
  )
  .fromTo(
    ".small-text-msg",
    {
      scale: 0,
      rotation: -15,
      opacity: 0,
      y: 30,
    },
    {
      // delay: 1,
      duration: 1,
      scale: 1,
      rotation: 0,
      opacity: 1,
      y: 0,
      ease: "elastic.out(1, 0.5)",
    },
    "+=1",
  )
  .fromTo(
    ".bye-text-msg",
    {
      scale: 0,
      rotation: -15,
      opacity: 0,
      y: 30,
    },
    {
      // delay: 1,
      duration: 1,
      scale: 1,
      rotation: 32,
      opacity: 1,
      y: 0,
      ease: "elastic.out(1, 0.5)",
    },
    "+=1",
  )

  .to(
    {},
    {
      duration: 1,
    },
  )

  .to([".small-text-msg", ".bye-text-msg"], {
    scale: 0,
    opacity: 0,
    duration: 0.5,
  })

  .to(".portfolio-img", {
    y: 540,
    duration: 1,
    ease: "power2.inOut",
    display: "none",
  })
  .to(".gsap-container h1", {
    opacity: 0,
  })
  .to(
    ".gradient-cericle",
    {
      opacity: 1,
      scale: 20, // important: make it HUGE
      duration: 1.2,
      ease: "power3.inOut",
    },
    "<",
  )
  .to(".overlay", {
    opacity: 1,
    duration: 1,
  })
  .to(
    ".overlay h2",
    {
      scale: 1,
      yoyo: true,
      repeat: -1,
      opacity: 0.3,
    },
    "<",
  );
