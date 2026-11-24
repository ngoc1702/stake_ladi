/** @type {import('next').NextConfig} */
const nextConfig = {
  poweredByHeader: false,
  async redirects() {
    return [{source:'/prop-firm-review',destination:'/prop-firm-review.html',permanent:true}];
  },
};
export default nextConfig;
