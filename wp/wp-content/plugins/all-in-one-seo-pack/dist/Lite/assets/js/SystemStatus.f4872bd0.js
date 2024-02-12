import{u as R,p as U,D as V}from"./links.6fea55de.js";import{C as F}from"./Card.79833296.js";import{G as N,a as z}from"./Row.c43f487a.js";import{S as B}from"./Checkmark.600c9af3.js";import{c as O}from"./index.c4983756.js";import{S as j}from"./Download.fb147cd7.js";import{T as G,a as M}from"./Row.0a31cd53.js";import{y as e,X as J,c as r,D as s,m as o,o as n,a,E as m,t as l,O as W,l as k,F as d,d as f,I as g,L as I}from"./vue.esm-bundler.f425fb9b.js";import{_ as X}from"./_plugin-vue_export-helper.c114f5e4.js";import"./default-i18n.3881921e.js";import"./isArrayLikeObject.a77a8422.js";import"./Tooltip.7040733e.js";import"./Caret.660dc2fe.js";import"./Slide.ab12a8fa.js";const q={setup(){return{rootStore:R(),toolsStore:U()}},components:{CoreCard:F,GridColumn:N,GridRow:z,SvgCheckmark:B,SvgCopy:O,SvgDownload:j,TableColumn:G,TableRow:M},data(){return{copied:!1,emailError:null,emailAddress:null,sendingEmail:!1,strings:{systemStatusInfo:this.$t.__("System Status Info",this.$td),downloadSystemInfoFile:this.$t.__("Download System Info File",this.$td),copyToClipboard:this.$t.__("Copy to Clipboard",this.$td),emailDebugInformation:this.$t.__("Email Debug Information",this.$td),submit:this.$t.__("Submit",this.$td),wordPress:this.$t.__("WordPress",this.$td),serverInfo:this.$t.__("Server Info",this.$td),activeTheme:this.$t.__("Active Theme",this.$td),muPlugins:this.$t.__("Must-Use Plugins",this.$td),activePlugins:this.$t.__("Active Plugins",this.$td),inactivePlugins:this.$t.__("Inactive Plugins",this.$td),copied:this.$t.__("Copied!",this.$td)}}},computed:{copySystemStatusInfo(){return JSON.stringify(this.rootStore.aioseo.data.status)}},methods:{onCopy(){this.copied=!0,setTimeout(()=>{this.copied=!1},2e3)},onError(){},downloadSystemStatusInfo(){const y=new Blob([JSON.stringify(this.rootStore.aioseo.data.status)],{type:"application/json"}),i=document.createElement("a");i.href=URL.createObjectURL(y),i.download=`aioseo-system-status-${V.now().toFormat("yyyy-MM-dd")}.json`,i.click(),URL.revokeObjectURL(i.href)},processEmailDebugInfo(){if(this.emailError=!1,!this.emailAddress||!/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(this.emailAddress)){this.emailError=!0;return}this.sendingEmail=!0,this.toolsStore.emailDebugInfo(this.emailAddress).then(()=>{this.emailAddress=null,this.sendingEmail=!1})}}},H={class:"aioseo-tools-system-status-info"},K={class:"actions"},Q={class:"aioseo-settings-row"},Y={class:"settings-name"},Z={class:"name"},tt={class:"settings-content"},st={class:"system-status-table"},et=["title"];function ot(y,i,nt,E,t,c){const D=e("svg-download"),_=e("base-button"),A=e("svg-copy"),$=e("svg-checkmark"),S=e("grid-column"),T=e("base-input"),x=e("grid-row"),b=e("table-column"),P=e("table-row"),L=e("core-card"),p=J("clipboard");return n(),r("div",H,[s(L,{slug:"systemStatusInfo","header-text":t.strings.systemStatusInfo},{default:o(()=>[a("div",K,[s(x,null,{default:o(()=>[s(S,{sm:"6",class:"left"},{default:o(()=>[s(_,{type:"blue",size:"small",onClick:c.downloadSystemStatusInfo},{default:o(()=>[s(D),m(" "+l(t.strings.downloadSystemInfoFile),1)]),_:1},8,["onClick"]),W((n(),k(_,{type:"blue",size:"small"},{default:o(()=>[t.copied?f("",!0):(n(),r(d,{key:0},[s(A),m(" "+l(t.strings.copyToClipboard),1)],64)),t.copied?(n(),r(d,{key:1},[s($),m(" "+l(t.strings.copied),1)],64)):f("",!0)]),_:1})),[[p,c.copySystemStatusInfo,"copy"],[p,c.onCopy,"success"],[p,c.onError,"error"]])]),_:1}),s(S,{sm:"6",class:"right"},{default:o(()=>[s(T,{size:"small",placeholder:t.strings.emailDebugInformation,modelValue:t.emailAddress,"onUpdate:modelValue":i[0]||(i[0]=u=>t.emailAddress=u),class:g({"aioseo-error":t.emailError})},null,8,["placeholder","modelValue","class"]),s(_,{type:"blue",size:"small",onClick:c.processEmailDebugInfo,loading:t.sendingEmail},{default:o(()=>[m(l(t.strings.submit),1)]),_:1},8,["onClick","loading"])]),_:1})]),_:1})]),a("div",Q,[(n(!0),r(d,null,I(E.rootStore.aioseo.data.status,(u,v)=>{var w;return n(),r(d,{key:v},[(w=u.results)!=null&&w.length?(n(),r("div",{key:0,class:g(["settings-group",["settings-group--"+v]])},[a("div",Y,[a("div",Z,l(u.label),1)]),a("div",tt,[a("div",st,[(n(!0),r(d,null,I(u.results,(h,C)=>(n(),k(P,{key:C,class:g({even:C%2===0})},{default:o(()=>[s(b,{class:"system-status-header"},{default:o(()=>[a("span",{title:h.header},l(h.header),9,et)]),_:2},1024),s(b,null,{default:o(()=>[m(l(h.value),1)]),_:2},1024)]),_:2},1032,["class"]))),128))])])],2)):f("",!0)],64)}),128))])]),_:1},8,["header-text"])])}const St=X(q,[["render",ot]]);export{St as default};
