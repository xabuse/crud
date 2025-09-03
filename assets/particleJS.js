particlesJS('particles-js', {
    particles: {
        number: { value: 60 },
        color: { value: '#ffffff' },
        shape: { type: 'circle' },
        opacity: { value: 0.6 },
        size: { value: 3, random: true },
        line_linked: {
            enable: true,
            distance: 150,
            color: '#ffffff',
            opacity: 0.4,
            width: 1
        },
        move: {
            enable: true,
            speed: 4
        }
    },
    interactivity: {
        events: {
            onhover: { enable: true, mode: 'repulse' },
            onclick: { enable: true, mode: 'push' }
        },
        modes: {
            repulse: { distance: 100 },
            push: { particles_nb: 3 }
        }
    }
});