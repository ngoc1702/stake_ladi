import Link from 'next/link';
import LanguageSwitcher from './LanguageSwitcher';
import {site} from '../lib/content';

export default function Header() {
  return <header className="stake-site-header"><div className="stake-shell stake-header-inner">
    <Link className="stake-brand" href="/" aria-label={site.title}><img src={site.logo} alt={site.name} /></Link>
    <div className="stake-header-right"><Link className="stake-header-blog" href="/blog">Blog &amp; Reviews</Link>
      <nav className="stake-header-actions" aria-label="Account"><a className="stake-btn" href={site.login.url} target="_blank" rel="noopener noreferrer">{site.login.title}</a><a className="stake-btn stake-btn-accent" href={site.register.url} target="_blank" rel="noopener noreferrer">{site.register.title}</a></nav>
      <LanguageSwitcher />
    </div></div></header>;
}
