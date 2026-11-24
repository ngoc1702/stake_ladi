import {getArticles,site} from '../lib/content';
export default function sitemap(){return [{url:site.url+'/'},{url:site.url+'/blog'},...getArticles().map(article=>({url:site.url+article.path,lastModified:article.updated}))];}
