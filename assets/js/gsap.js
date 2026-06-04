const tl = gsap.timeline();

tl.to('h1', {
    opacity: 1,
    delay: 1,
    duration: 1,
    // x: 200
})
.to('.portfolio-img', {
    // delay: 2,
    duration: 1,
    y: -530
})
.fromTo(
    '.small-text-msg',
    {
        scale: 0,
        rotation: -15,
        opacity: 0,
        y: 30
    },
    {
        delay: 1,
        duration: 1,
        scale: 1,
        rotation: 0,
        opacity: 1,
        y: 0,
        ease: "elastic.out(1, 0.5)"
    }
)
.fromTo(
    '.bye-text-msg',
    {
        scale: 0,
        rotation: -15,
        opacity: 0,
        y: 30
    },
    {
        delay: 1,
        duration: 1,
        scale: 1,
        rotation: 32,
        opacity: 1,
        y: 0,
        ease: "elastic.out(1, 0.5)"
    }
);