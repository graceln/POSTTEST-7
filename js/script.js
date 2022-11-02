// alert ("Welcome!");

const checkbox = document.getElementById('checkbox');
checkbox.addEventListener('change', () => {
    document.body.classList.toggle('dark');
});

const aboutUs = document.getElementById('aboutUs');
aboutUs.style.fontFamily = "Impact,Charcoal,sans-serif";


const text = document.getElementById('text');
text.style.color = "red";