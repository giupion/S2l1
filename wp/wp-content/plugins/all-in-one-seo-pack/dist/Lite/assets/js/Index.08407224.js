import{o,c as n,a as r,I as y,y as _,l as d,d as c,t as u}from"./vue.esm-bundler.f425fb9b.js";import{_ as i}from"./_plugin-vue_export-helper.c114f5e4.js";const f={props:{scoreColor:String,score:{type:Number,required:!0},strokeWidth:{type:Number,default(){return 2}}},computed:{getClass(){let t="",s="";switch(!0){case 33>=this.score:t="fast",s="stroke-red";break;case 66>=this.score:t="medium",s="stroke-orange";break;default:t="slow",s="stroke-green"}return this.scoreColor!==void 0&&(s=`stroke-${this.scoreColor}`),`${t} ${s}`}}},m={class:"aioseo-seo-site-score-svg",viewBox:"0 0 34 34",xmlns:"http://www.w3.org/2000/svg"},v=["stroke-width","r"],p=["stroke-width","stroke-dasharray","r"];function x(t,s,e,g,a,l){return o(),n("svg",m,[r("circle",{class:"aioseo-seo-site-score__background","stroke-width":e.strokeWidth,fill:"none",cx:"17",cy:"17",r:17-e.strokeWidth/2},null,8,v),r("circle",{class:y(["aioseo-seo-site-score__circle",l.getClass]),"stroke-width":e.strokeWidth,"stroke-dasharray":`${e.score},100`,"stroke-linecap":"round",fill:"none",cx:"17",cy:"17",r:17-e.strokeWidth/2},null,10,p)])}const w=i(f,[["render",x]]);const S={},C={class:"aioseo-seo-site-score-svg-loading",viewBox:"0 0 33.83098862 33.83098862",xmlns:"http://www.w3.org/2000/svg"},W=r("circle",{fill:"none",class:"aioseo-seo-site-score-loading__circle",cx:"16.91549431",cy:"16.91549431",r:"15.91549431","stroke-linecap":"round","stroke-width":"2","stroke-dasharray":"93","stroke-dashoffset":"90"},null,-1),$=[W];function b(t,s){return o(),n("svg",C,$)}const B=i(S,[["render",b]]);const L={components:{SvgSeoSiteScore:w,SvgSeoSiteScoreLoading:B},props:{score:Number,loading:Boolean,description:String,strokeWidth:{type:Number,default(){return 1.75}}},data(){return{strings:{analyzing:this.$t.__("Analyzing...",this.$td)}}}},N={class:"aioseo-site-score"},z={class:"aioseo-score-amount-wrapper"},A={key:0,class:"aioseo-score-amount"},I={class:"score"},H=r("span",{class:"total"},"/ 100",-1),M=["innerHTML"],T={key:2,class:"score-analyzing"};function V(t,s,e,g,a,l){const h=_("svg-seo-site-score-loading"),k=_("svg-seo-site-score");return o(),n("div",N,[e.loading?(o(),d(h,{key:0})):c("",!0),e.loading?c("",!0):(o(),d(k,{key:1,score:e.score,strokeWidth:e.strokeWidth},null,8,["score","strokeWidth"])),r("div",z,[e.loading?c("",!0):(o(),n("div",A,[r("span",I,u(e.score),1),H])),e.loading?c("",!0):(o(),n("div",{key:1,class:"score-description",innerHTML:e.description},null,8,M)),e.loading?(o(),n("div",T,u(a.strings.analyzing),1)):c("",!0)])])}const E=i(L,[["render",V]]);export{E as C,w as S};
