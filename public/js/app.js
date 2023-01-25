/*! For license information please see app.js.LICENSE.txt */
(self.webpackChunk=self.webpackChunk||[]).push([[773],{5278:(e,t,o)=>{"use strict";function n(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,n)}return o}function r(e,t,o){return t in e?Object.defineProperty(e,t,{value:o,enumerable:!0,configurable:!0,writable:!0}):e[t]=o,e}o.d(t,{Z:()=>i});const i=(0,o(821).reactive)({items:[],add:function(e){this.items.unshift(function(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?n(Object(o),!0).forEach((function(t){r(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):n(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}({key:Symbol()},e))},remove:function(e){this.items.splice(e,1)}})},4103:(e,t,o)=>{"use strict";var n=o(821),r=o(9038),i=o(1966),a={class:"min-h-screen bg-gray-100 dark:bg-zinc-800",style:{transition:"all 0.5s ease"}},s={class:"md:hidden flex justify-between items-center bg-white max-screen-2xl mx-auto px-6"},l=(0,n.createElementVNode)("div",{class:""},"SV7CC",-1),c=[(0,n.createElementVNode)("i",{class:"bx bx-menu"},null,-1)],u={key:0,class:"relative bg-white"},d={class:"hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white"},p=(0,n.createTextVNode)(" Dashboard "),h={key:0,class:"hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white"},m=(0,n.createTextVNode)(" Members "),f={key:1,class:"hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white"},v=(0,n.createTextVNode)(" Loan Services "),g={key:2,class:"hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white"},y=(0,n.createTextVNode)(" Events "),x={key:3,class:"hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white"},b=(0,n.createTextVNode)(" Posts "),w={key:4,class:"hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white"},k=(0,n.createTextVNode)(" Roles "),C={class:"hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white"},E=(0,n.createTextVNode)(" Settings "),S=(0,n.createTextVNode)(" Logout"),V={class:"px-2 text-xs text-black/50 group-hover:text-white group-active:text-white"},N={id:"main"};var L={class:"logo-details",style:{margin:"6px 14px 0 14px"}},O=["src"],B=(0,n.createElementVNode)("div",{class:"logo_name"}," Southville 7 ",-1),_={style:{display:"flex","flex-direction":"column","justify-content":"space-between","flex-grow":"1","max-height":"calc(100% - 60px)"}},P={id:"my-scroll",style:{margin:"6px 14px 0 14px"}},T={class:"nav-list",style:{overflow:"visible"}},j={key:0},z={class:"links_name"},D={class:"tooltip"},I={key:0,class:"profile dark:bg-zinc-900"},A={class:"profile-details dark:bg-zinc-900 bg-theme-800"},M={key:0,src:"/images/photo.jpg",alt:"profileImg",class:"hidden"},R={key:1,class:"bx bxs-user-rectangle"},$={class:"name_job"},F={class:"name"},G={class:"job"},Z={key:0,class:"dark:bg-zinc-900 bg-theme-800 bx bx-log-out",id:"log_out"};const U={name:"SidebarMenuAkahon",components:{Link:r.rU},props:{isMenuOpen:{type:Boolean,default:!0},menuTitle:{type:String,default:"Southville 7"},menuLogo:{type:String,default:""},menuIcon:{type:String,default:"bx-analyse"},isPaddingLeft:{type:Boolean,default:!0},menuOpenedPaddingLeftBody:{type:String,default:"250px"},menuClosedPaddingLeftBody:{type:String,default:"78px"},menuItems:{type:Array,default:function(){return[{link:route("dashboard"),name:"Dashboard",tooltip:"Dashboard",icon:"bx-grid-alt",parent:"Dashboard",role:[]},{link:route("members.index"),name:"Members",tooltip:"Members",icon:"bx-user",parent:"Members",role:["Secretary","Chairman","Vice Chairman","Treasurer"]},{link:route("loanables.index"),name:"Loan Services",tooltip:"Loan Services",icon:"bx-donate-heart",parent:"Loan Services",role:["Chairman","Vice Chairman","Treasurer"]},{link:route("events.index"),name:"Events",tooltip:"Events",icon:"bx-calendar-event",parent:"Events",role:["Secretary"]},{link:route("post.index"),name:"Posts",tooltip:"Posts",icon:"bx-news",parent:"Posts",role:["Secretary"]},{link:route("roles.index"),name:"Roles",tooltip:"Roles",icon:"bx-briefcase",parent:"Roles",role:["Chairman","Vice Chairman"]},{link:route("user.settings"),name:"Settings",tooltip:"Settings",icon:"bx-cog",parent:"User",role:[]}]}},profileImg:{type:String,default:"/assets/img/photo.jpg"},profileName:{type:String,default:"Admin"},profileRole:{type:String,default:""},isExitButton:{type:Boolean,default:!0},isLoggedIn:{type:Boolean,default:!0},bgColor:{type:String,default:"#012129"},secondaryColor:{type:String,default:"#4A2C2A"},homeSectionColor:{type:String,default:"#e4e9f7"},logoTitleColor:{type:String,default:"#fff"},iconsColor:{type:String,default:"#fff"},itemsTooltipColor:{type:String,default:"#e4e9f7"},searchInputTextColor:{type:String,default:"#fff"},menuItemsHoverColor:{type:String,default:"#fff"},menuItemsTextColor:{type:String,default:"#fff"},menuFooterTextColor:{type:String,default:"#fff"}},data:function(){var e;return{width:null!==(e=window.innerWidth)&&void 0!==e?e:screen.width,isOpened:!1}},mounted:function(){var e,t=null!==(e=window.innerWidth)&&void 0!==e?e:screen.width;this.isOpened=t>768?this.isMenuOpen:this.isOpened,this.width>768?document.getElementById("main").style.paddingLeft=this.isOpened?this.menuOpenedPaddingLeftBody:this.menuClosedPaddingLeftBody:document.getElementById("main").style.paddingLeft="0px",window.addEventListener("resize",this.beResponsive)},computed:{cssVars:function(){return{"--bg-color":this.bgColor,"--secondary-color":this.secondaryColor,"--home-section-color":this.homeSectionColor,"--logo-title-color":this.logoTitleColor,"--icons-color":this.iconsColor,"--items-tooltip-color":this.itemsTooltipColor,"--serach-input-text-color":this.searchInputTextColor,"--menu-items-hover-color":this.menuItemsHoverColor,"--menu-items-text-color":this.menuItemsTextColor,"--menu-footer-text-color":this.menuFooterTextColor}}},watch:{isOpened:function(){document.getElementById("main").style.paddingLeft=this.isOpened&&this.isPaddingLeft?this.menuOpenedPaddingLeftBody:this.menuClosedPaddingLeftBody}},methods:{beResponsive:function(){var e;this.width=null!==(e=window.innerWidth)&&void 0!==e?e:screen.width,this.width>900?this.isOpened=!0:this.width>768?this.isOpened=!1:document.getElementById("main").style.paddingLeft="0px"}}};var W=o(3379),Y=o.n(W),q=o(1446),H={insert:"head",singleton:!1};Y()(q.Z,H);q.Z.locals;var X=o(3744);const J=(0,X.Z)(U,[["render",function(e,t,o,r,i,a){var s=(0,n.resolveComponent)("Link");return i.width>768?((0,n.openBlock)(),(0,n.createElementBlock)("div",{key:0,class:(0,n.normalizeClass)(["sidebar dark:bg-zinc-900 bg-theme-800",i.isOpened?"open":""]),style:(0,n.normalizeStyle)(a.cssVars)},[(0,n.createElementVNode)("div",L,[o.menuLogo?((0,n.openBlock)(),(0,n.createElementBlock)("img",{key:0,src:o.menuLogo,alt:"menu-logo",class:"menu-logo icon"},null,8,O)):((0,n.openBlock)(),(0,n.createElementBlock)("i",{key:1,class:(0,n.normalizeClass)(["bx icon",o.menuIcon])},null,2)),B,(0,n.createElementVNode)("i",{class:(0,n.normalizeClass)(["bx",i.isOpened?"bx-menu-alt-right":"bx-menu"]),id:"btn",onClick:t[0]||(t[0]=function(e){return i.isOpened=!i.isOpened})},null,2)]),(0,n.createElementVNode)("div",_,[(0,n.createElementVNode)("div",P,[(0,n.createElementVNode)("ul",T,[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(o.menuItems,(function(t,o){return(0,n.openBlock)(),(0,n.createElementBlock)("span",{class:"relative group",key:o},[t.role.some((function(t){return e.$page.props.auth.position.includes(t)}))||t.role.length<1?((0,n.openBlock)(),(0,n.createElementBlock)("li",j,[(0,n.createVNode)(s,{href:t.link,class:(0,n.normalizeClass)([{active:e.$page.component.startsWith(t.parent)},"dark:bg-zinc-900"])},{default:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("i",{class:(0,n.normalizeClass)(["bx",t.icon||"bx-square-rounded"])},null,2),(0,n.createElementVNode)("span",z,(0,n.toDisplayString)(t.name),1)]})),_:2},1032,["href","class"]),(0,n.createElementVNode)("span",D,(0,n.toDisplayString)(t.tooltip),1)])):(0,n.createCommentVNode)("",!0)])})),128))])]),o.isLoggedIn?((0,n.openBlock)(),(0,n.createElementBlock)("div",I,[(0,n.createElementVNode)("div",A,[o.profileImg?((0,n.openBlock)(),(0,n.createElementBlock)("img",M)):((0,n.openBlock)(),(0,n.createElementBlock)("i",R)),(0,n.createElementVNode)("div",$,[(0,n.createElementVNode)("div",F,(0,n.toDisplayString)(e.$page.props.auth.user.name),1),(0,n.createElementVNode)("div",G,(0,n.toDisplayString)(1===e.$page.props.auth.user.id?"Admin":e.$page.props.auth.position.length?e.$page.props.auth.position[0]:"Member"),1)])]),(0,n.createVNode)(s,{as:"button",href:e.route("logout"),method:"post"},{default:(0,n.withCtx)((function(){return[o.isExitButton?((0,n.openBlock)(),(0,n.createElementBlock)("i",Z)):(0,n.createCommentVNode)("",!0)]})),_:1},8,["href"])])):(0,n.createCommentVNode)("",!0)])],6)):(0,n.createCommentVNode)("",!0)}]]);var K=[(0,n.createElementVNode)("i",{class:"bx bx-x text-lg inline-flex rounded-full hover:bg-black/10 w-max h-max"},null,-1)];const Q={__name:"Toast",props:{message:String,type:String},emits:["remove"],setup:function(e,t){var o=t.emit;return(0,n.onMounted)((function(){setTimeout((function(){return o("remove")}),3e3)})),function(t,r){return e.message&&e.type?((0,n.openBlock)(),(0,n.createElementBlock)("div",{key:0,class:(0,n.normalizeClass)(["font-semibold text-sm shadow-md py-2 px-4 rounded-lg flex justify-between items-center",{"bg-green-600 text-white":"success"===e.type,"bg-red-600 text-white":"error"===e.type}])},[(0,n.createElementVNode)("div",null,(0,n.toDisplayString)("".concat(e.message)),1),(0,n.createElementVNode)("button",{onClick:r[0]||(r[0]=function(e){return o("remove")})},K)],2)):(0,n.createCommentVNode)("",!0)}}};var ee=o(9680),te=o(5278);const oe={__name:"ToastList",setup:function(e){var t=(0,r.qt)(),o=ee.Inertia.on("finish",(function(){t.props.value.flash.message&&te.Z.add({message:t.props.value.flash.message,type:t.props.value.flash.type})}));return(0,n.onUnmounted)((function(){o()})),function(e,t){return(0,n.openBlock)(),(0,n.createBlock)(n.TransitionGroup,{tag:"div","enter-from-class":"translate-x-full opacity-0","enter-active-class":"duration-300 ease-in-out","leave-active-class":"duration-500 ease-in-out","leave-to-class":"translate-x-full opacity-0",class:"fixed top-4 right-4 max-w-xs w-full z-[999] space-y-3"},{default:(0,n.withCtx)((function(){return[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)((0,n.unref)(te.Z).items,(function(e,t){return(0,n.openBlock)(),(0,n.createBlock)(Q,{key:e.key,message:e.message,type:e.type,onRemove:function(e){return function(e){te.Z.remove(e)}(t)}},null,8,["message","type","onRemove"])})),128))]})),_:1})}}},ne={components:{SidebarMenuAkahon:J,Link:r.rU,ToastList:oe},data:function(){return{isDropdownOpen:!1}}},re=(0,X.Z)(ne,[["render",function(e,t,o,r,i,L){var O=(0,n.resolveComponent)("SidebarMenuAkahon"),B=(0,n.resolveComponent)("Link"),_=(0,n.resolveComponent)("ToastList");return(0,n.openBlock)(),(0,n.createElementBlock)(n.Fragment,null,[(0,n.createElementVNode)("div",{class:(0,n.normalizeClass)(e.$page.props.dark)},[(0,n.createElementVNode)("div",a,[(0,n.createVNode)(O),(0,n.createElementVNode)("div",s,[l,(0,n.createElementVNode)("button",{onClick:t[0]||(t[0]=function(e){return i.isDropdownOpen=!i.isDropdownOpen}),class:(0,n.normalizeClass)(["m-3 text-4xl flex items-center rounded-lg bg-white text-theme-800 border-theme-800 border",{"bg-theme-800 text-white":i.isDropdownOpen}])},c,2)]),i.isDropdownOpen?((0,n.openBlock)(),(0,n.createElementBlock)("div",u,[(0,n.createElementVNode)("ul",null,[(0,n.createElementVNode)("li",d,[(0,n.createVNode)(B,{onClick:t[1]||(t[1]=function(e){return i.isDropdownOpen=!1}),href:e.route("dashboard"),class:"block py-4 px-2"},{default:(0,n.withCtx)((function(){return[p]})),_:1},8,["href"])]),e.$page.props.auth.position.length?((0,n.openBlock)(),(0,n.createElementBlock)("li",h,[(0,n.createVNode)(B,{onClick:t[2]||(t[2]=function(e){return i.isDropdownOpen=!1}),href:e.route("members.index"),class:"block py-4 px-2"},{default:(0,n.withCtx)((function(){return[m]})),_:1},8,["href"])])):(0,n.createCommentVNode)("",!0),e.$page.props.auth.position.some((function(e){return["Chairman","Vice Chairman","Treasurer"].includes(e)}))?((0,n.openBlock)(),(0,n.createElementBlock)("li",f,[(0,n.createVNode)(B,{onClick:t[3]||(t[3]=function(e){return i.isDropdownOpen=!1}),href:e.route("loanables.index"),class:"block py-4 px-2"},{default:(0,n.withCtx)((function(){return[v]})),_:1},8,["href"])])):(0,n.createCommentVNode)("",!0),e.$page.props.auth.position.includes("Secretary")?((0,n.openBlock)(),(0,n.createElementBlock)("li",g,[(0,n.createVNode)(B,{onClick:t[4]||(t[4]=function(e){return i.isDropdownOpen=!1}),href:e.route("events.index"),class:"block py-4 px-2"},{default:(0,n.withCtx)((function(){return[y]})),_:1},8,["href"])])):(0,n.createCommentVNode)("",!0),e.$page.props.auth.position.includes("Secretary")?((0,n.openBlock)(),(0,n.createElementBlock)("li",x,[(0,n.createVNode)(B,{onClick:t[5]||(t[5]=function(e){return i.isDropdownOpen=!1}),href:e.route("post.index"),class:"block py-4 px-2"},{default:(0,n.withCtx)((function(){return[b]})),_:1},8,["href"])])):(0,n.createCommentVNode)("",!0),e.$page.props.auth.position.some((function(e){return["Chairman","Vice Chairman"].includes(e)}))?((0,n.openBlock)(),(0,n.createElementBlock)("li",w,[(0,n.createVNode)(B,{onClick:t[6]||(t[6]=function(e){return i.isDropdownOpen=!1}),href:e.route("roles.index"),class:"block py-4 px-2"},{default:(0,n.withCtx)((function(){return[k]})),_:1},8,["href"])])):(0,n.createCommentVNode)("",!0),(0,n.createElementVNode)("li",C,[(0,n.createVNode)(B,{onClick:t[7]||(t[7]=function(e){return i.isDropdownOpen=!1}),href:e.route("user.settings"),class:"block py-4 px-2"},{default:(0,n.withCtx)((function(){return[E]})),_:1},8,["href"])]),(0,n.createVNode)(B,{onClick:t[8]||(t[8]=function(e){return i.isDropdownOpen=!1}),href:e.route("logout"),method:"post",class:"py-4 px-2 hover:bg-theme-800 hover:text-white ease-in-out duration-200 active:bg-theme-800 active:text-white flex items-center group"},{default:(0,n.withCtx)((function(){return[S,(0,n.createElementVNode)("span",V,"("+(0,n.toDisplayString)(e.$page.props.auth.user.name)+")",1)]})),_:1},8,["href"])])])):(0,n.createCommentVNode)("",!0),(0,n.createElementVNode)("main",N,[(0,n.renderSlot)(e.$slots,"default")])])],2),(0,n.createVNode)(_)],64)}]]);function ie(e){return ie="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},ie(e)}var ae;function se(){se=function(){return e};var e={},t=Object.prototype,o=t.hasOwnProperty,n="function"==typeof Symbol?Symbol:{},r=n.iterator||"@@iterator",i=n.asyncIterator||"@@asyncIterator",a=n.toStringTag||"@@toStringTag";function s(e,t,o){return Object.defineProperty(e,t,{value:o,enumerable:!0,configurable:!0,writable:!0}),e[t]}try{s({},"")}catch(e){s=function(e,t,o){return e[t]=o}}function l(e,t,o,n){var r=t&&t.prototype instanceof d?t:d,i=Object.create(r.prototype),a=new C(n||[]);return i._invoke=function(e,t,o){var n="suspendedStart";return function(r,i){if("executing"===n)throw new Error("Generator is already running");if("completed"===n){if("throw"===r)throw i;return S()}for(o.method=r,o.arg=i;;){var a=o.delegate;if(a){var s=b(a,o);if(s){if(s===u)continue;return s}}if("next"===o.method)o.sent=o._sent=o.arg;else if("throw"===o.method){if("suspendedStart"===n)throw n="completed",o.arg;o.dispatchException(o.arg)}else"return"===o.method&&o.abrupt("return",o.arg);n="executing";var l=c(e,t,o);if("normal"===l.type){if(n=o.done?"completed":"suspendedYield",l.arg===u)continue;return{value:l.arg,done:o.done}}"throw"===l.type&&(n="completed",o.method="throw",o.arg=l.arg)}}}(e,o,a),i}function c(e,t,o){try{return{type:"normal",arg:e.call(t,o)}}catch(e){return{type:"throw",arg:e}}}e.wrap=l;var u={};function d(){}function p(){}function h(){}var m={};s(m,r,(function(){return this}));var f=Object.getPrototypeOf,v=f&&f(f(E([])));v&&v!==t&&o.call(v,r)&&(m=v);var g=h.prototype=d.prototype=Object.create(m);function y(e){["next","throw","return"].forEach((function(t){s(e,t,(function(e){return this._invoke(t,e)}))}))}function x(e,t){function n(r,i,a,s){var l=c(e[r],e,i);if("throw"!==l.type){var u=l.arg,d=u.value;return d&&"object"==ie(d)&&o.call(d,"__await")?t.resolve(d.__await).then((function(e){n("next",e,a,s)}),(function(e){n("throw",e,a,s)})):t.resolve(d).then((function(e){u.value=e,a(u)}),(function(e){return n("throw",e,a,s)}))}s(l.arg)}var r;this._invoke=function(e,o){function i(){return new t((function(t,r){n(e,o,t,r)}))}return r=r?r.then(i,i):i()}}function b(e,t){var o=e.iterator[t.method];if(void 0===o){if(t.delegate=null,"throw"===t.method){if(e.iterator.return&&(t.method="return",t.arg=void 0,b(e,t),"throw"===t.method))return u;t.method="throw",t.arg=new TypeError("The iterator does not provide a 'throw' method")}return u}var n=c(o,e.iterator,t.arg);if("throw"===n.type)return t.method="throw",t.arg=n.arg,t.delegate=null,u;var r=n.arg;return r?r.done?(t[e.resultName]=r.value,t.next=e.nextLoc,"return"!==t.method&&(t.method="next",t.arg=void 0),t.delegate=null,u):r:(t.method="throw",t.arg=new TypeError("iterator result is not an object"),t.delegate=null,u)}function w(e){var t={tryLoc:e[0]};1 in e&&(t.catchLoc=e[1]),2 in e&&(t.finallyLoc=e[2],t.afterLoc=e[3]),this.tryEntries.push(t)}function k(e){var t=e.completion||{};t.type="normal",delete t.arg,e.completion=t}function C(e){this.tryEntries=[{tryLoc:"root"}],e.forEach(w,this),this.reset(!0)}function E(e){if(e){var t=e[r];if(t)return t.call(e);if("function"==typeof e.next)return e;if(!isNaN(e.length)){var n=-1,i=function t(){for(;++n<e.length;)if(o.call(e,n))return t.value=e[n],t.done=!1,t;return t.value=void 0,t.done=!0,t};return i.next=i}}return{next:S}}function S(){return{value:void 0,done:!0}}return p.prototype=h,s(g,"constructor",h),s(h,"constructor",p),p.displayName=s(h,a,"GeneratorFunction"),e.isGeneratorFunction=function(e){var t="function"==typeof e&&e.constructor;return!!t&&(t===p||"GeneratorFunction"===(t.displayName||t.name))},e.mark=function(e){return Object.setPrototypeOf?Object.setPrototypeOf(e,h):(e.__proto__=h,s(e,a,"GeneratorFunction")),e.prototype=Object.create(g),e},e.awrap=function(e){return{__await:e}},y(x.prototype),s(x.prototype,i,(function(){return this})),e.AsyncIterator=x,e.async=function(t,o,n,r,i){void 0===i&&(i=Promise);var a=new x(l(t,o,n,r),i);return e.isGeneratorFunction(o)?a:a.next().then((function(e){return e.done?e.value:a.next()}))},y(g),s(g,a,"Generator"),s(g,r,(function(){return this})),s(g,"toString",(function(){return"[object Generator]"})),e.keys=function(e){var t=[];for(var o in e)t.push(o);return t.reverse(),function o(){for(;t.length;){var n=t.pop();if(n in e)return o.value=n,o.done=!1,o}return o.done=!0,o}},e.values=E,C.prototype={constructor:C,reset:function(e){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(k),!e)for(var t in this)"t"===t.charAt(0)&&o.call(this,t)&&!isNaN(+t.slice(1))&&(this[t]=void 0)},stop:function(){this.done=!0;var e=this.tryEntries[0].completion;if("throw"===e.type)throw e.arg;return this.rval},dispatchException:function(e){if(this.done)throw e;var t=this;function n(o,n){return a.type="throw",a.arg=e,t.next=o,n&&(t.method="next",t.arg=void 0),!!n}for(var r=this.tryEntries.length-1;r>=0;--r){var i=this.tryEntries[r],a=i.completion;if("root"===i.tryLoc)return n("end");if(i.tryLoc<=this.prev){var s=o.call(i,"catchLoc"),l=o.call(i,"finallyLoc");if(s&&l){if(this.prev<i.catchLoc)return n(i.catchLoc,!0);if(this.prev<i.finallyLoc)return n(i.finallyLoc)}else if(s){if(this.prev<i.catchLoc)return n(i.catchLoc,!0)}else{if(!l)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return n(i.finallyLoc)}}}},abrupt:function(e,t){for(var n=this.tryEntries.length-1;n>=0;--n){var r=this.tryEntries[n];if(r.tryLoc<=this.prev&&o.call(r,"finallyLoc")&&this.prev<r.finallyLoc){var i=r;break}}i&&("break"===e||"continue"===e)&&i.tryLoc<=t&&t<=i.finallyLoc&&(i=null);var a=i?i.completion:{};return a.type=e,a.arg=t,i?(this.method="next",this.next=i.finallyLoc,u):this.complete(a)},complete:function(e,t){if("throw"===e.type)throw e.arg;return"break"===e.type||"continue"===e.type?this.next=e.arg:"return"===e.type?(this.rval=this.arg=e.arg,this.method="return",this.next="end"):"normal"===e.type&&t&&(this.next=t),u},finish:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var o=this.tryEntries[t];if(o.finallyLoc===e)return this.complete(o.completion,o.afterLoc),k(o),u}},catch:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var o=this.tryEntries[t];if(o.tryLoc===e){var n=o.completion;if("throw"===n.type){var r=n.arg;k(o)}return r}}throw new Error("illegal catch attempt")},delegateYield:function(e,t,o){return this.delegate={iterator:E(e),resultName:t,nextLoc:o},"next"===this.method&&(this.arg=void 0),u}},e}function le(e,t,o,n,r,i,a){try{var s=e[i](a),l=s.value}catch(e){return void o(e)}s.done?t(l):Promise.resolve(l).then(n,r)}o(7333);var ce,ue,de=(null===(ae=window.document.getElementsByTagName("title")[0])||void 0===ae?void 0:ae.innerText)||"SV7";(0,r.yP)({title:function(e){return"".concat(e," - ").concat(de)},resolve:(ce=se().mark((function e(t){var n;return se().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,o(1273)("./".concat(t,".vue"));case 2:return void 0===(n=e.sent.default).layout&&(n.layout=re),e.abrupt("return",n);case 5:case"end":return e.stop()}}),e)})),ue=function(){var e=this,t=arguments;return new Promise((function(o,n){var r=ce.apply(e,t);function i(e){le(r,o,n,i,a,"next",e)}function a(e){le(r,o,n,i,a,"throw",e)}i(void 0)}))},function(e){return ue.apply(this,arguments)}),setup:function(e){var t=e.el,o=e.app,r=e.props,i=e.plugin;return(0,n.createApp)({render:function(){return(0,n.h)(o,r)}}).use(i).mixin({methods:{route}}).mount(t)}}),i.I.init({delay:250,color:"#e16e5f",includeCSS:!0,showSpinner:!0})},7333:(e,t,o)=>{window._=o(6486),window.axios=o(9669),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest"},1446:(e,t,o)=>{"use strict";o.d(t,{Z:()=>i});var n=o(3645),r=o.n(n)()((function(e){return e[1]}));r.push([e.id,"*{box-sizing:border-box;font-family:Poppins,sans-serif;margin:0;padding:0}main{transition:all .5s ease}.menu-logo{margin:0 10px;width:30px}.sidebar{display:flex;flex-direction:column;height:100%;left:0;min-height:-webkit-min-content;min-height:-moz-min-content;min-height:min-content;position:relative;position:fixed;top:0;transition:all .5s ease;width:78px;z-index:30}.sidebar.open{width:250px}.sidebar .logo-details{align-items:center;display:flex;height:60px;position:relative}.sidebar .logo-details .icon{opacity:0;transition:all .5s ease}.sidebar .logo-details .logo_name{color:var(--logo-title-color);font-size:20px;font-weight:600;opacity:0;transition:all .5s ease}.sidebar.open .logo-details .icon,.sidebar.open .logo-details .logo_name{opacity:1}.sidebar .logo-details #btn{cursor:pointer;font-size:22px;font-size:23px;position:absolute;right:0;text-align:center;top:50%;transform:translateY(-50%);transition:all .4s ease;transition:all .5s ease}.sidebar.open .logo-details #btn{text-align:right}.sidebar i{color:var(--icons-color);font-size:28px;height:60px;line-height:60px;min-width:50px;text-align:center}.sidebar .nav-list{margin-top:20px}.sidebar li{list-style:none;margin:8px 0;position:relative}.sidebar li .tooltip{background:var(--items-tooltip-color);border-radius:4px;box-shadow:0 5px 10px rgba(0,0,0,.3);font-size:15px;font-weight:400;left:calc(100% + 15px);opacity:0;padding:6px 12px;pointer-events:none;position:absolute;top:-20px;transition:0s;white-space:nowrap;z-index:3}.sidebar li:hover .tooltip{opacity:1;pointer-events:auto;top:50%;transform:translateY(-50%);transition:all .4s ease}.sidebar.open li .tooltip{display:none}.sidebar input{background:var(--secondary-color);border:none;border-radius:12px;color:var(--serach-input-text-color);font-size:15px;font-weight:400;height:50px;outline:none;transition:all .5s ease;width:100%;width:50px}.sidebar li a{align-items:center;border-radius:12px;display:flex;height:100%;text-decoration:none;transition:all .4s ease;width:100%}.sidebar li a.active{background:hsla(0,0%,100%,.2)}.sidebar li a:hover{background:var(--menu-items-hover-color)}.sidebar li a .links_name{color:var(--menu-items-text-color);font-size:15px;font-weight:400;opacity:0;pointer-events:none;transition:.4s;white-space:nowrap}.sidebar.open li a .links_name{opacity:1;pointer-events:auto}.sidebar li a:hover .links_name,.sidebar li a:hover i{color:var(--bg-color);transition:all .5s ease}.sidebar li i{border-radius:12px;font-size:18px;height:50px;line-height:50px}.sidebar div.profile{height:60px;overflow:hidden;padding:10px 14px;position:relative;transition:all .5s ease;width:78px}.sidebar.open div.profile{width:250px}.sidebar div .profile-details{align-items:center;display:flex;flex-wrap:nowrap;transition:all .5s ease}.sidebar div img{border-radius:6px;height:45px;margin-right:10px;-o-object-fit:cover;object-fit:cover;width:45px}.sidebar div.profile .job,.sidebar div.profile .name{color:var(--menu-footer-text-color);font-size:15px;font-weight:400;white-space:nowrap}.sidebar div.profile .job{font-size:12px}.sidebar .profile #log_out{border-radius:0;height:60px;line-height:60px;position:absolute;right:0;top:50%;transform:translateY(-50%);transition:all .5s ease;width:100%}.sidebar.open .profile #log_out{width:50px}.sidebar.open .profile:hover #log_out{opacity:1}.sidebar.open .profile #log_out:hover{color:#ed7464;opacity:1}.sidebar .profile #log_out:hover{color:#ed7464}.home-section{background:var(--home-section-color);left:78px;min-height:100vh;position:relative;top:0;transition:all .5s ease;width:calc(100% - 78px);z-index:2}.sidebar.open~.home-section{left:250px;width:calc(100% - 250px)}.home-section .text{color:var(--bg-color);display:inline-block;font-size:25px;font-weight:500;margin:18px}#my-scroll,.my-scroll-active{overflow-y:auto}#my-scroll{height:calc(100% - 60px)}#my-scroll::-webkit-scrollbar{display:none}@media (max-width:420px){.sidebar li .tooltip{display:none}}",""]);const i=r},2584:()=>{},1273:(e,t,o)=>{var n={"./Auth/ConfirmPassword.vue":[6027,27],"./Auth/ForgotPassword.vue":[5721,721],"./Auth/Login.vue":[5205,205],"./Auth/Register.vue":[97,97],"./Auth/ResetPassword.vue":[976,976],"./Auth/VerifyEmail.vue":[7836,836],"./Beneficiary/Edit.vue":[8423,423],"./Clients/Create.vue":[6822,822],"./Clients/Edit.vue":[194,194],"./Clients/Index.vue":[4946,898,946],"./Clients/Show.vue":[1800,898,425],"./Clients/View.vue":[9037,898,586],"./Configurations/Company Information.vue":[2e3,0],"./Configurations/Pages.vue":[3142,38],"./Configurations/Theme.vue":[871,385],"./Dashboard.vue":[189,189],"./Dashboard/Admin.vue":[2727,727],"./Dashboard/User.vue":[7735,898,762],"./Events/Create.vue":[9708,175],"./Events/Edit.vue":[4957,898,283],"./Events/Index.vue":[6200,898,310],"./Home.vue":[7034,34],"./Loan Services/Create.vue":[8398,398],"./Loan Services/Edit.vue":[142,142],"./Loan Services/Index.vue":[3776,898,776],"./Loan/Create.vue":[2816,898,338],"./Loan/Edit.vue":[2275,275],"./Loan/View.vue":[5117,898,612],"./Members/Create.vue":[2351,351],"./Members/Edit.vue":[5037,966],"./Members/Index.vue":[3418,898,418],"./Members/Show.vue":[5130,898,509],"./Members/View.vue":[8955,898,935],"./Payment/Edit.vue":[1340,898,214],"./Posts/Create.vue":[5134,134],"./Posts/Edit.vue":[7711,711],"./Posts/Index.vue":[5982,898,564],"./Roles/Index.vue":[5339,898,339],"./Savings/Create.vue":[8220,898,989],"./Share Capital/Create.vue":[884,898,640],"./User/Settings.vue":[6064,64],"./Welcome.vue":[2520,520]};function r(e){if(!o.o(n,e))return Promise.resolve().then((()=>{var t=new Error("Cannot find module '"+e+"'");throw t.code="MODULE_NOT_FOUND",t}));var t=n[e],r=t[0];return Promise.all(t.slice(1).map(o.e)).then((()=>o(r)))}r.keys=()=>Object.keys(n),r.id=1273,e.exports=r},4654:()=>{}},e=>{var t=t=>e(e.s=t);e.O(0,[170,898],(()=>(t(4103),t(2584))));e.O()}]);