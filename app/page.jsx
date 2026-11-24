import { readContent } from '../lib/content';
export const metadata={alternates:{canonical:'/'}};
export default function HomePage() {
  return <div dangerouslySetInnerHTML={{__html:readContent('home.html')}} />;
}
