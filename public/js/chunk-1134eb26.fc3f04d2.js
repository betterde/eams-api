(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1134eb26"],{"1d9d":function(e,t,r){},"53f4":function(e,t,r){"use strict";var a=r("1d9d"),n=r.n(a);n.a},"8dfd":function(e,t,r){"use strict";r.r(t);var a=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"signin-view"},[r("div",{staticClass:"panel signin"},[e._m(0),r("div",{staticClass:"panel-body"},[r("el-form",{ref:"signin",attrs:{model:e.credentials,rules:e.rules}},[r("el-form-item",{attrs:{prop:"guard"}},[r("el-select",{staticStyle:{display:"block"},attrs:{autocomplete:"off",placeholder:"Please select your identity type"},model:{value:e.credentials.guard,callback:function(t){e.$set(e.credentials,"guard",t)},expression:"credentials.guard"}},[r("el-option",{attrs:{label:"Teacher",value:"teacher"}}),r("el-option",{attrs:{label:"Student",value:"student"}})],1)],1),r("el-form-item",{attrs:{prop:"username"}},[r("el-input",{attrs:{autocomplete:"off",placeholder:"Username"},model:{value:e.credentials.username,callback:function(t){e.$set(e.credentials,"username",t)},expression:"credentials.username"}})],1),r("el-form-item",{attrs:{prop:"password"}},[r("el-input",{attrs:{type:"password",placeholder:"Password","show-password":""},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.submit(t)}},model:{value:e.credentials.password,callback:function(t){e.$set(e.credentials,"password",t)},expression:"credentials.password"}})],1),r("el-form-item",{staticClass:"login-button"},[r("el-button",{staticClass:"pull-right",staticStyle:{width:"100%"},attrs:{type:"primary",plain:"",loading:e.loading},on:{click:e.submit}},[e._v("Sign-In")])],1),r("div",{staticClass:"tips"},[r("p",[e._v("If you forgot your password, "),r("router-link",{attrs:{to:"/forgot"}},[e._v("Please click here!")])],1)])],1)],1)])])},n=[function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"panel-header"},[r("h1",{staticClass:"panel-title"},[e._v("EAMS")])])}],s=(r("a481"),r("4360")),i=r("c1c4"),l={name:"SignIn",data:function(){return{loading:!1,credentials:{guard:"",username:"",password:""},rules:{guard:[{required:!0,message:"Please select your identity type",trigger:"change"}],username:[{required:!0,message:"Please enter the email address",trigger:"blur"}],password:[{required:!0,message:"Please enter password",trigger:"blur"}]}}},methods:{submit:function(){var e=this;this.$refs.signin.validate((function(t){if(!t)return!1;e.loading=!0,s["a"].dispatch("signIn",e.credentials).then((function(){s["a"].dispatch("fetchProfile").then((function(t){e.loading=!1,e.$router.addRoutes(Object(i["a"])(t.data.guard)),e.$router.replace("/")}))})).catch((function(t){e.loading=!1,t.hasOwnProperty("exception")?e.$message.error("".concat(t.exception,": ").concat(t.message)):e.$message.error(t.message)}))}))}}},o=l,c=(r("53f4"),r("2877")),u=Object(c["a"])(o,a,n,!1,null,null,null);t["default"]=u.exports},a481:function(e,t,r){"use strict";var a=r("cb7c"),n=r("4bf8"),s=r("9def"),i=r("4588"),l=r("0390"),o=r("5f1b"),c=Math.max,u=Math.min,d=Math.floor,p=/\$([$&`']|\d\d?|<[^>]*>)/g,f=/\$([$&`']|\d\d?)/g,g=function(e){return void 0===e?e:String(e)};r("214f")("replace",2,(function(e,t,r,v){return[function(a,n){var s=e(this),i=void 0==a?void 0:a[t];return void 0!==i?i.call(a,s,n):r.call(String(s),a,n)},function(e,t){var n=v(r,e,this,t);if(n.done)return n.value;var d=a(e),p=String(this),f="function"===typeof t;f||(t=String(t));var m=d.global;if(m){var b=d.unicode;d.lastIndex=0}var w=[];while(1){var y=o(d,p);if(null===y)break;if(w.push(y),!m)break;var k=String(y[0]);""===k&&(d.lastIndex=l(p,s(d.lastIndex),b))}for(var $="",S=0,x=0;x<w.length;x++){y=w[x];for(var _=String(y[0]),C=c(u(i(y.index),p.length),0),P=[],I=1;I<y.length;I++)P.push(g(y[I]));var O=y.groups;if(f){var A=[_].concat(P,C,p);void 0!==O&&A.push(O);var E=String(t.apply(void 0,A))}else E=h(_,p,C,P,O,t);C>=S&&($+=p.slice(S,C)+E,S=C+_.length)}return $+p.slice(S)}];function h(e,t,a,s,i,l){var o=a+e.length,c=s.length,u=f;return void 0!==i&&(i=n(i),u=p),r.call(l,u,(function(r,n){var l;switch(n.charAt(0)){case"$":return"$";case"&":return e;case"`":return t.slice(0,a);case"'":return t.slice(o);case"<":l=i[n.slice(1,-1)];break;default:var u=+n;if(0===u)return r;if(u>c){var p=d(u/10);return 0===p?r:p<=c?void 0===s[p-1]?n.charAt(1):s[p-1]+n.charAt(1):r}l=s[u-1]}return void 0===l?"":l}))}}))}}]);
//# sourceMappingURL=chunk-1134eb26.fc3f04d2.js.map