'use client';
import {useEffect,useRef,useState} from 'react';
import Script from 'next/script';
const languages=[['en','English'],['vi','Tiếng Việt'],['fr','Français'],['de','Deutsch'],['es','Español'],['hi','हिन्दी'],['pt','Português'],['zh-CN','简体中文']];
export default function LanguageSwitcher() {
  const [open,setOpen]=useState(false);
  const [language,setLanguage]=useState('en');
  const [load,setLoad]=useState(false);
  const container=useRef(null);
  const selected=useRef('en');
  const observer=useRef(null);
  function applyLanguage(value) {
    const select=document.querySelector('#site-translate-engine .goog-te-combo');
    if(select) {select.value=value;select.dispatchEvent(new Event('change',{bubbles:true}));}
  }
  useEffect(()=>{
    const saved=document.cookie.match(/(?:^|;\s*)googtrans=([^;]+)/)?.[1]?.split('/').pop();
    if(saved&&languages.some(([code])=>code===saved)) {selected.current=saved;setLanguage(saved);if(saved!=='en')setLoad(true);}
    function initialize() {
      if(!window.google?.translate?.TranslateElement) return;
      const element=document.getElementById('site-translate-engine');
      if(!element?.hasChildNodes()) new window.google.translate.TranslateElement({pageLanguage:'en',includedLanguages:languages.map(([code])=>code).join(','),autoDisplay:false},'site-translate-engine');
      if(selected.current!=='en') {
        if(element.querySelector('.goog-te-combo')) applyLanguage(selected.current);
        else {
          observer.current?.disconnect();
          observer.current=new MutationObserver(()=>{if(element.querySelector('.goog-te-combo')){applyLanguage(selected.current);observer.current?.disconnect();}});
          observer.current.observe(element,{childList:true,subtree:true});
        }
      }
    }
    window.skybetTranslateInit=initialize;
    const close=event=>{if(container.current&&!container.current.contains(event.target))setOpen(false);};
    const keyboard=event=>{if(event.key==='Escape')setOpen(false);};
    document.addEventListener('click',close);
    document.addEventListener('keydown',keyboard);
    return ()=>{observer.current?.disconnect();document.removeEventListener('click',close);document.removeEventListener('keydown',keyboard);};
  },[]);
  function choose(code) {
    selected.current=code;setLanguage(code);setOpen(false);
    document.cookie=`googtrans=/en/${code};path=/;SameSite=Lax`;
    if(window.google?.translate) applyLanguage(code); else if(code!=='en') setLoad(true);
  }
  return <div className="stake-header-translate notranslate" translate="no" ref={container}>
    <button className="site-language-button" type="button" aria-expanded={open} aria-controls="site-languages" onClick={()=>setOpen(!open)}><img src={`/images/${language}.svg`} alt="" width="24" height="18" /><span>{language==='zh-CN'?'ZH':language.toUpperCase()}</span><i aria-hidden="true" /></button>
    {open&&<div className="site-language-menu" id="site-languages" aria-label="Choose language">{languages.map(([code,label])=><button key={code} type="button" onClick={()=>choose(code)} aria-pressed={language===code}><img src={`/images/${code}.svg`} alt="" width="24" height="18" />{label}</button>)}<a href="https://translate.google.com/" target="_blank" rel="noopener noreferrer">Powered by Google Translate</a></div>}
    <div className="site-translate-engine" id="site-translate-engine" />
    {load&&<Script id="site-translate-script" src="https://translate.google.com/translate_a/element.js?cb=skybetTranslateInit" strategy="afterInteractive" onReady={()=>window.skybetTranslateInit?.()} />}
  </div>;
}
