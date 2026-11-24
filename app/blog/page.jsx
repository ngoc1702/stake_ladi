import Link from 'next/link';
import {getArticles,formatDate} from '../../lib/content';
export const metadata={title:'Blog & Reviews',description:'Explore trading guides and independent reviews from Stake.',alternates:{canonical:'/blog'}};
export default function BlogPage() {
  const articles=getArticles();
  return <main><a className="review-skip" href="#blog-articles">Skip to articles</a><section className="blog-list-section review-container" id="blog-articles" aria-labelledby="blog-list-title"><div className="blog-list-header"><div><span className="blog-kicker">LEARN. COMPARE. UNDERSTAND.</span><h1 id="blog-list-title">Latest articles</h1></div><span className="blog-count">{articles.length} {articles.length===1?'article':'articles'}</span></div><div className="blog-grid">{articles.map(article=><article className="blog-card" key={article.slug}>
    <Link className="blog-card-image" href={article.path} tabIndex={-1} aria-hidden="true"><img src={article.image} alt="" width="600" height="338" /></Link><div className="blog-card-copy"><div className="blog-card-meta"><span>{article.category.toUpperCase()}</span><span>{article.readingTime} min read</span></div><h3><Link href={article.path}>{article.title}</Link></h3><p>{article.excerpt}</p><div className="blog-card-bottom"><time dateTime={article.published}>{formatDate(article.published,true)}</time><Link href={article.path} aria-label={`Read: ${article.title}`}>Read article</Link></div></div></article>)}</div></section></main>;
}
