import fs from 'node:fs';
import path from 'node:path';
import articleData from '../data/articles.json';
import siteData from '../data/site.json';

export const site = siteData;
export function readContent(filename) {
  const base = path.join(process.cwd(), 'content');
  const file = path.resolve(base, filename);
  if (!file.startsWith(base + path.sep)) throw new Error('Invalid content path');
  return fs.readFileSync(file, 'utf8');
}
export function getArticles() {
  return articleData.map(article => {
    const content = readContent('articles/' + article.content);
    const words = content.replace(/<[^>]+>/g, ' ').match(/\b[\w']+\b/g) || [];
    const headings = [...content.matchAll(/<h2\b[^>]*id="([^"]+)"[^>]*>(.*?)<\/h2>/gis)].map(match=>({id:match[1],title:match[2].replace(/<[^>]+>/g,'')}));
    return {...article,content,headings,readingTime:Math.max(1,Math.ceil(words.length/200))};
  });
}
export function formatDate(value, short = false) {
  return new Intl.DateTimeFormat('en-US',{month:short?'short':'long',day:'numeric',year:'numeric',timeZone:'UTC'}).format(new Date(value+'T12:00:00Z'));
}
