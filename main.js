// main.js - small helpers: scroll fade-in, mobile toggle
document.addEventListener('DOMContentLoaded', ()=>{
  // IntersectionObserver for fade-in
  const obs = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if (e.isIntersecting) e.target.classList.add('in-view');
    });
  },{threshold:0.12});
  document.querySelectorAll('.fade-up').forEach(el=>obs.observe(el));

  // mobile nav toggle
  const btn = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.nav');
  if (btn){
    btn.addEventListener('click', ()=>{
      nav.classList.toggle('open');
    });
  }
});
