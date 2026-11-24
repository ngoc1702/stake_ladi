import Header from '../components/Header';
import Footer from '../components/Footer';
import SiteInteractions from '../components/SiteInteractions';
import { site } from '../lib/content';
import './styles/base.css';
import './styles/landing.css';
import './styles/blog-review.css';
import './styles/typography.css';
import './styles/next.css';

export const metadata = {
  metadataBase:new URL(site.url),
  title:{default:site.title,template:'%s | Stake'},
  description:site.description,
  icons:{icon:site.favicon,apple:site.favicon},
  openGraph:{type:'website',siteName:site.name,locale:'en_US',title:site.title,description:site.description},
};
export default function RootLayout({children}) {
  return <html lang="en"><head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  </head><body className="stake-review-page"><Header />{children}<Footer /><SiteInteractions /></body></html>;
}
