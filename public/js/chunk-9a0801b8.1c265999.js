(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-9a0801b8"],{"0522":function(e,t,s){"use strict";var n=s("1fd6"),a=s.n(n);a.a},1932:function(e,t,s){"use strict";s.r(t);var n=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"main-content"},[s("div",{staticClass:"panel"},[s("div",{staticClass:"panel-header",class:e.classes},[s("div",{staticClass:"panel-tools"},[s("el-row",{attrs:{gutter:20}},[s("el-col",{staticStyle:{"text-align":"left"},attrs:{span:12}},[s("el-button",{attrs:{type:"info",plain:""},on:{click:function(t){return e.$router.back()}}},[e._v("Go back")])],1)],1)],1)]),s("div",{staticClass:"panel-body",class:e.classes,staticStyle:{height:"80vh",display:"flex","flex-direction":"row"}},[s("el-main",{staticStyle:{padding:"0"}},[s("el-container",{staticClass:"is-vertical",staticStyle:{height:"100%"}},[s("div",{staticClass:"chat-header"},[s("h1",[e._v(e._s(e.student.name))])]),s("el-main",{staticStyle:{flex:"1","flex-basis":"auto",overflow:"hidden","box-sizing":"border-box",display:"block",margin:"0 20px",padding:"0"}},[s("div",{staticClass:"messages-container"},e._l(e.messages,(function(t){return s("div",{key:t.id},[s("div",{class:t.from===e.profile.id?"im-message-text right":"im-message-text left"},[s("pre",[e._v(e._s(t.content))])])])})),0)]),s("el-footer",{staticStyle:{"margin-top":"20px"}},[s("el-row",[s("el-col",[s("el-input",{attrs:{placeholder:"Press Enter to send",disabled:e.sending},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.sendMessage(t)}},model:{value:e.message.content,callback:function(t){e.$set(e.message,"content",t)},expression:"message.content"}})],1)],1)],1)],1)],1)],1)])])},a=[],i=(s("8e6e"),s("ac6a"),s("456d"),s("bd86")),o=s("2f62"),c=s("f8c8");function r(e,t){var s=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),s.push.apply(s,n)}return s}function l(e){for(var t=1;t<arguments.length;t++){var s=null!=arguments[t]?arguments[t]:{};t%2?r(s,!0).forEach((function(t){Object(i["a"])(e,t,s[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(s)):r(s).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(s,t))}))}return e}var u={name:"Chat",data:function(){return{id:this.$route.params.id,classes:["animated","fade-in","fast"],sending:!1,message:{to:this.$route.params.id,content:""},student:{id:"",name:"",email:""},messages:[]}},methods:{fetchStudent:function(){var e=this;c["a"].student.fetchStudent(this.id).then((function(t){e.student=t.data})).catch((function(t){e.$message.error({offset:95,message:t.message})}))},fetchMessages:function(){var e=this;c["a"].message.fetchMessages({to:this.id}).then((function(t){e.messages=t.data,e.scrollToBottom()})).catch((function(t){e.$message.error({offset:95,message:t.message})}))},sendMessage:function(){var e=this;this.sending=!0,c["a"].message.sendMessage(this.message).then((function(t){e.sending=!1,e.message.content="",e.messages.push(t.data),e.scrollToBottom()})).catch((function(t){e.sending=!1,e.$message.error({offset:95,message:t.message})}))},scrollToBottom:function(){var e=this;this.$nextTick((function(){var t=e.$el.querySelector(".messages-container");t.scrollTo({top:t.scrollHeight,behavior:"smooth"})}))}},computed:l({},Object(o["b"])({profile:function(e){return e.account.profile},access_token:function(e){return e.account.access_token}})),mounted:function(){var e=this;window.Echo.private("message.".concat(this.profile.id)).listen(".MessageNotification",(function(t){e.messages.push(t.message),e.scrollToBottom()})),this.fetchStudent(),this.fetchMessages()}},d=u,f=(s("0522"),s("2877")),g=Object(f["a"])(d,n,a,!1,null,null,null);t["default"]=g.exports},"1fd6":function(e,t,s){}}]);
//# sourceMappingURL=chunk-9a0801b8.1c265999.js.map