'use client';
import {useEffect} from 'react';
import {usePathname} from 'next/navigation';
export default function SiteInteractions() {
  const pathname=usePathname();
  useEffect(()=>{
    const cleanup=[];
    const listen=(element,event,callback,options)=>{element.addEventListener(event,callback,options);cleanup.push(()=>element.removeEventListener(event,callback,options));};
    const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    document.querySelectorAll('#main-landing a[href^="#"]').forEach(link=>listen(link,'click',event=>{
      const hash=link.getAttribute('href');
      const target=hash?.length>1?document.getElementById(hash.slice(1)):null;
      if(target){event.preventDefault();target.scrollIntoView({behavior:reduced?'instant':'smooth',block:'start'});}
    }));
    document.querySelectorAll('#main-landing .stake-faq-item button').forEach(button=>listen(button,'click',()=>{
      const expanded=button.getAttribute('aria-expanded')==='true';
      button.setAttribute('aria-expanded',String(!expanded));
      const answer=document.getElementById(button.getAttribute('aria-controls'));
      if(answer)answer.hidden=expanded;
    }));
    for(const config of [
      {root:'[data-game-slider]',track:'[data-slider-track]',prev:'[data-slider-prev]',next:'[data-slider-next]',card:'.stake-game',page:true},
      {root:'[data-testimonial-slider]',track:'[data-testimonial-track]',prev:'[data-testimonial-prev]',next:'[data-testimonial-next]',card:'.stake-testimonial-card'}
    ]) document.querySelectorAll(config.root).forEach(slider=>{
      const track=slider.querySelector(config.track),previous=slider.querySelector(config.prev),next=slider.querySelector(config.next);
      if(!track||!previous||!next)return;
      const update=()=>{previous.disabled=track.scrollLeft<=2;next.disabled=track.scrollLeft>=track.scrollWidth-track.clientWidth-2;};
      const step=()=>{const card=track.querySelector(config.card);if(!card)return track.clientWidth;const width=card.getBoundingClientRect().width+(parseFloat(getComputedStyle(track).columnGap)||0);return width*(config.page?Math.max(1,Math.floor(track.clientWidth/width)):1);};
      listen(previous,'click',()=>track.scrollBy({left:-step(),behavior:reduced?'instant':'smooth'}));
      listen(next,'click',()=>track.scrollBy({left:step(),behavior:reduced?'instant':'smooth'}));
      listen(track,'scroll',update,{passive:true});listen(window,'resize',update);update();
    });
    return ()=>cleanup.forEach(remove=>remove());
  },[pathname]);
  return null;
}
