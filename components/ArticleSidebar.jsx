'use client';
import {useEffect,useState} from 'react';
export default function ArticleSidebar({headings}) {
  const [active,setActive]=useState('');
  const [progress,setProgress]=useState(0);
  const [message,setMessage]=useState('');
  useEffect(()=>{
    const article=document.getElementById('review-content');
    let scheduled=false;
    function update(){
      const start=article.getBoundingClientRect().top+window.scrollY;
      setProgress(Math.min(100,Math.max(0,(window.scrollY-start)/Math.max(1,article.offsetHeight-window.innerHeight)*100)));
      const current=headings.filter(heading=>document.getElementById(heading.id)?.getBoundingClientRect().top<150).pop();
      setActive(current?.id||'');scheduled=false;
    }
    const schedule=()=>{if(!scheduled){scheduled=true;requestAnimationFrame(update);}};
    window.addEventListener('scroll',schedule,{passive:true});window.addEventListener('resize',schedule);update();
    return ()=>{window.removeEventListener('scroll',schedule);window.removeEventListener('resize',schedule);};
  },[headings]);
  async function copy(){try{await navigator.clipboard.writeText(location.href.split('#')[0]);setMessage('Article link copied.');}catch{setMessage('Copy the address from your browser to share this article.');}}
  return <><div className="review-progress" aria-hidden="true"><span style={{width:`${progress}%`}} /></div><aside className="review-sidebar"><details className="review-toc" open><summary>On this page</summary><nav aria-label="Article contents">{headings.map(heading=><a key={heading.id} href={`#${heading.id}`} aria-current={active===heading.id?'location':undefined}>{heading.title}</a>)}</nav></details><div className="review-share"><span>Save this guide for later</span><button type="button" id="review-copy" onClick={copy}>Copy article link</button><span role="status">{message}</span></div></aside></>;
}
