System.register([],function(a){"use strict";return{execute:function(){a("c",i);var d=Object.defineProperty,n=(t,e)=>d(t,"name",{value:e,configurable:!0});function o(t){const e=document.createElement("pre");return e.style.width="1px",e.style.height="1px",e.style.position="fixed",e.style.top="5px",e.textContent=t,e}n(o,"createNode");function c(t){if("clipboard"in navigator)return navigator.clipboard.writeText(t.textContent||"");const e=getSelection();if(e==null)return Promise.reject(new Error);e.removeAllRanges();const r=document.createRange();return r.selectNodeContents(t),e.addRange(r),document.execCommand("copy"),e.removeAllRanges(),Promise.resolve()}n(c,"copyNode");function i(t){if("clipboard"in navigator)return navigator.clipboard.writeText(t);const e=document.body;if(!e)return Promise.reject(new Error);const r=o(t);return e.appendChild(r),c(r),e.removeChild(r),Promise.resolve()}n(i,"copyText")}}});
//# sourceMappingURL=chunk-copy-b5292489.js.map