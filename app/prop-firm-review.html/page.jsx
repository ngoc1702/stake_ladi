import Link from 'next/link';
import {getArticles,formatDate} from '../../lib/content';
import ArticleSidebar from '../../components/ArticleSidebar';
const article=getArticles()[0];
export const metadata={title:article.title,description:article.excerpt,alternates:{canonical:article.path},openGraph:{type:'article',title:article.title,description:article.excerpt,publishedTime:article.published,modifiedTime:article.updated,images:[article.image]}};
export default function ReviewPage() {
  return <main id="review-main"><a className="review-skip" href="#review-content">Skip to article</a><div className="review-container"><nav className="review-breadcrumb" aria-label="Breadcrumb"><Link href="/">Home</Link><span>/</span><Link href="/blog">Blog &amp; Reviews</Link><span>/</span><span>Prop trading</span></nav></div>
    <div className="review-container review-layout"><ArticleSidebar headings={article.headings} /><article className="review-article" id="review-content"><header className="review-article-header"><div className="review-eyebrow"><span>{article.category.toUpperCase()}</span></div><h1>{article.title}</h1><div className="review-meta"><span className="review-avatar" aria-hidden="true">S</span><div><strong>{article.author}</strong><span>Trading education</span></div><div className="review-date"><time dateTime={article.published}>{formatDate(article.published)}</time><span>{article.readingTime} min read</span></div></div></header><div dangerouslySetInnerHTML={{__html:article.content}} /></article></div>
    <section className="review-end"><div className="review-container"><span>MORE FROM STAKE</span><h2>Keep exploring. Keep asking better questions.</h2><p>Practical guides and thoughtful reviews, all in one place.</p><Link href="/blog">Back to all articles</Link></div></section></main>;
}
