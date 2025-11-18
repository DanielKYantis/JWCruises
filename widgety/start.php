<?php
  if (function_exists('header_remove')) {
    @header_remove('X-Powered-By');
    @header_remove('X-Frame-Options');
    header_remove('Pragma');
    header_remove('Expires');
  }
  header('X-XSS-Protection: 0', true);
  header('Cache-Control: public, max-age=30', true);
  header('Strict-Transport-Security: max-age=63072000; includeSubDomains; preload', true);
  header('X-Content-Type-Options: nosniff', true);
  header('Referrer-Policy: strict-origin-when-cross-origin', true);
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
  header("Access-Control-Allow-Credentials: true");
  $origin = $_SERVER['HTTP_ORIGIN'] ?? '';
  $allowed = ['https://jwcruises.com', 'https://www.widgety.co.uk'];
  if (in_array($origin, $allowed, true)) { header("Access-Control-Allow-Origin: $origin"); }
  // elseif (php_sapi_name() !== 'cli') { header("Access-Control-Allow-Origin: https://jwcruises.com"); }
  // header("Access-Control-Allow-Origin: *");
  header('Reporting-Endpoints: csp="/csp-report-endpoint.php"', true);
  header('Report-To: {"group":"csp","max_age":10886400,"endpoints":[{"url":"/csp-report-endpoint.php"}],"include_subdomains":true}', true);
  $csp = "default-src 'self'; base-uri 'self'; object-src 'none'; "
       . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://www.widgety.co.uk; "
       . "font-src 'self' data: https://use.typekit.net https://fonts.gstatic.com https://www.widgety.co.uk; "
       . "script-src 'self' 'unsafe-inline' https://www.googletagmanager.com https://www.google-analytics.com https://www.gstatic.com https://www.google.com https://www.recaptcha.net https://www.widgety.co.uk; "
       . "connect-src 'self' https://www.google-analytics.com https://www.googletagmanager.com https://www.google.com https://www.googleapis.com https://www.gstatic.com https://*.mapbox.com https://www.widgety.co.uk; "
       . "img-src 'self' data: blob: https://www.google-analytics.com https://assets.widgety.co.uk; "
       . "media-src 'self' blob:; "
       . "worker-src 'self' blob:; manifest-src 'self'; "
       . "frame-src 'self' https://www.google.com https://www.gstatic.com https://www.recaptcha.net https://www.widgety.co.uk; "
       . "frame-ancestors 'self' https://www.google.com https://www.widgety.co.uk; "
       . "report-to csp; report-uri /csp-report-endpoint.php";
  header("Content-Security-Policy: upgrade-insecure-requests;", true);
  // header("Content-Security-Policy: upgrade-insecure-requests; $csp", true);
  header("Content-Security-Policy-Report-Only: $csp", true);
?>
<!DOCTYPE html>
<html class="widget no-js wf-futurapt-n7-active wf-futurapt-n5-active wf-active" lang="en"><head><meta http-equiv="origin-trial" content="A7vZI3v+Gz7JfuRolKNM4Aff6zaGuT7X0mf3wtoZTnKv6497cVMnhy03KDqX7kBz/q/iidW7srW31oQbBt4VhgoAAACUeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGUuY29tOjQ0MyIsImZlYXR1cmUiOiJEaXNhYmxlVGhpcmRQYXJ0eVN0b3JhZ2VQYXJ0aXRpb25pbmczIiwiZXhwaXJ5IjoxNzU3OTgwODAwLCJpc1N1YmRvbWFpbiI6dHJ1ZSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ=="><meta charset="utf-8">
<meta content="initial-scale=1,maximum-scale=1,user-scalable=no,width=device-width" name="viewport">
<title>Widgety</title>
<meta content="authenticity_token" name="csrf-param">
<meta content="qM+MEJ9pVMLlkeeXuRYu51dWQCxyrfagq6gJfAWJsUA=" name="csrf-token">
<script src="https://use.typekit.net/stu5fvo.js"></script>
<script>
  try{Typekit.load();}catch(e){}
  window.mapboxPublicToken = "pk.eyJ1IjoiaWNydWlzZSIsImEiOiI3enBKbmdVIn0.fZ7xpdtCSEvCSf0qtcXzag"
  window.defaultMapboxStyle = 'mapbox://styles/icruise/cj806gu5c7h3l2rp8t43qbv4b'
  window.onError = window.onerror
  window.onerror = function(){ return true; }
  !function(e, t, a, o, i, r) {
    function n(e, t) {
      var a = typeof e[t];
      return "function" == a || !("object" != a || !e[t]) || "unknown" == a
    }
    function s(e, t) {
      return !("object" != typeof e[t] || !e[t])
    }
    function l(e) {
      return "[object Array]" === Object.prototype.toString.call(e)
    }
    function _() {
      var e = "Shockwave Flash"
        , t = "application/x-shockwave-flash";
      if (!b(navigator.plugins) && "object" == typeof navigator.plugins[e]) {
        var a = navigator.plugins[e].description;
        a && !b(navigator.mimeTypes) && navigator.mimeTypes[t] && navigator.mimeTypes[t].enabledPlugin && (B = a.match(/\d+/g))
      }
      if (!B) {
        var o;
        try {
          o = new ActiveXObject("ShockwaveFlash.ShockwaveFlash"),
          B = Array.prototype.slice.call(o.GetVariable("$version").match(/(\d+),(\d+),(\d+),(\d+)/), 1),
          o = null
        } catch (i) {}
      }
      if (!B)
        return !1;
      var r = parseInt(B[0], 10)
        , n = parseInt(B[1], 10);
      return D = r > 9 && n > 0,
      !0
    }
    function c() {
      if (!O) {
        O = !0;
        for (var e = 0; e < U.length; e++)
          U[e]();
        U.length = 0
      }
    }
    function u(e, t) {
      return O ? void e.call(t) : void U.push(function() {
        e.call(t)
      })
    }
    function d() {
      var e = parent;
      if ("" !== N)
        for (var t = 0, a = N.split("."); t < a.length; t++)
          e = e[a[t]];
      return e.easyXDM
    }
    function p(t) {
      return e.easyXDM = L,
      N = t,
      N && (G = "easyXDM_" + N.replace(".", "_") + "_"),
      H
    }
    function h(e) {
      return e.match(q)[3]
    }
    function m(e) {
      return e.match(q)[4] || ""
    }
    function g(e) {
      var t = e.toLowerCase().match(q)
        , a = t[2]
        , o = t[3]
        , i = t[4] || "";
      return ("http:" == a && ":80" == i || "https:" == a && ":443" == i) && (i = ""),
      a + "//" + o + i
    }
    function f(e) {
      if (e = e.replace(Y, "$1/"),
      !e.match(/^(http||https):\/\//)) {
        var t = "/" === e.substring(0, 1) ? "" : a.pathname;
        "/" !== t.substring(t.length - 1) && (t = t.substring(0, t.lastIndexOf("/") + 1)),
        e = a.protocol + "//" + a.host + t + e
      }
      for (; I.test(e); )
        e = e.replace(I, "");
      return e
    }
    function y(e, t) {
      var a = ""
        , o = e.indexOf("#");
      -1 !== o && (a = e.substring(o),
      e = e.substring(0, o));
      var i = [];
      for (var n in t)
        t.hasOwnProperty(n) && i.push(n + "=" + r(t[n]));
      return e + (z ? "#" : -1 == e.indexOf("?") ? "?" : "&") + i.join("&") + a
    }
    function b(e) {
      return "undefined" == typeof e
    }
    function v(e, t, a) {
      var o;
      for (var i in t)
        t.hasOwnProperty(i) && (i in e ? (o = t[i],
        "object" == typeof o ? v(e[i], o, a) : a || (e[i] = t[i])) : e[i] = t[i]);
      return e
    }
    function w() {
      var e = t.body.appendChild(t.createElement("form"))
        , a = e.appendChild(t.createElement("input"));
      a.name = G + "TEST" + F,
      T = a !== e.elements[a.name],
      t.body.removeChild(e)
    }
    function S(e) {
      b(T) && w();
      var a;
      T ? a = t.createElement('<iframe name="' + e.props.name + '"/>') : (a = t.createElement("IFRAME"),
      a.name = e.props.name),
      a.id = a.name = e.props.name,
      delete e.props.name,
      "string" == typeof e.container && (e.container = t.getElementById(e.container)),
      e.container || (v(a.style, {
        position: "absolute",
        top: "-2000px",
        left: "0px"
      }),
      e.container = t.body);
      var o = e.props.src;
      if (e.props.src = "javascript:false",
      v(a, e.props),
      a.border = a.frameBorder = 0,
      a.allowTransparency = !0,
      e.container.appendChild(a),
      e.onLoad && A(a, "load", e.onLoad),
      e.usePost) {
        var i, r = e.container.appendChild(t.createElement("form"));
        if (r.target = a.name,
        r.action = o,
        r.method = "POST",
        "object" == typeof e.usePost)
          for (var n in e.usePost)
            e.usePost.hasOwnProperty(n) && (T ? i = t.createElement('<input name="' + n + '"/>') : (i = t.createElement("INPUT"),
            i.name = n),
            i.value = e.usePost[n],
            r.appendChild(i));
        r.submit(),
        r.parentNode.removeChild(r)
      } else
        a.src = o;
      return e.props.src = o,
      a
    }
    function k(e, t) {
      "string" == typeof e && (e = [e]);
      for (var a, o = e.length; o--; )
        if (a = e[o],
        a = new RegExp("^" == a.substr(0, 1) ? a : "^" + a.replace(/(\*)/g, ".$1").replace(/\?/g, ".") + "$"),
        a.test(t))
          return !0;
      return !1
    }
    function C(o) {
      var i, r = o.protocol;
      if (o.isHost = o.isHost || b(j.xdm_p),
      z = o.hash || !1,
      o.props || (o.props = {}),
      o.isHost)
        o.remote = f(o.remote),
        o.channel = o.channel || "default" + F++,
        o.secret = Math.random().toString(16).substring(2),
        b(r) && (r = g(a.href) == g(o.remote) ? "4" : n(e, "postMessage") || n(t, "postMessage") ? "1" : o.swf && n(e, "ActiveXObject") && _() ? "6" : "Gecko" === navigator.product && "frameElement"in e && -1 == navigator.userAgent.indexOf("WebKit") ? "5" : o.remoteHelper ? "2" : "0");
      else if (o.channel = j.xdm_c.replace(/["'<>\\]/g, ""),
      o.secret = j.xdm_s,
      o.remote = j.xdm_e.replace(/["'<>\\]/g, ""),
      r = j.xdm_p,
      o.acl && !k(o.acl, o.remote))
        throw new Error("Access denied for " + o.remote);
      switch (o.protocol = r,
      r) {
      case "0":
        if (v(o, {
          interval: 100,
          delay: 2e3,
          useResize: !0,
          useParent: !1,
          usePolling: !1
        }, !0),
        o.isHost) {
          if (!o.local) {
            for (var s, l = a.protocol + "//" + a.host, c = t.body.getElementsByTagName("img"), u = c.length; u--; )
              if (s = c[u],
              s.src.substring(0, l.length) === l) {
                o.local = s.src;
                break
              }
            o.local || (o.local = e)
          }
          var d = {
            xdm_c: o.channel,
            xdm_p: 0
          };
          o.local === e ? (o.usePolling = !0,
          o.useParent = !0,
          o.local = a.protocol + "//" + a.host + a.pathname + a.search,
          d.xdm_e = o.local,
          d.xdm_pa = 1) : d.xdm_e = f(o.local),
          o.container && (o.useResize = !1,
          d.xdm_po = 1),
          o.remote = y(o.remote, d)
        } else
          v(o, {
            channel: j.xdm_c,
            remote: j.xdm_e,
            useParent: !b(j.xdm_pa),
            usePolling: !b(j.xdm_po),
            useResize: o.useParent ? !1 : o.useResize
          });
        i = [new H.stack.HashTransport(o), new H.stack.ReliableBehavior({}), new H.stack.QueueBehavior({
          encode: !0,
          maxLength: 4e3 - o.remote.length
        }), new H.stack.VerifyBehavior({
          initiate: o.isHost
        })];
        break;
      case "1":
        i = [new H.stack.PostMessageTransport(o)];
        break;
      case "2":
        o.isHost && (o.remoteHelper = f(o.remoteHelper)),
        i = [new H.stack.NameTransport(o), new H.stack.QueueBehavior, new H.stack.VerifyBehavior({
          initiate: o.isHost
        })];
        break;
      case "3":
        i = [new H.stack.NixTransport(o)];
        break;
      case "4":
        i = [new H.stack.SameOriginTransport(o)];
        break;
      case "5":
        i = [new H.stack.FrameElementTransport(o)];
        break;
      case "6":
        B || _(),
        i = [new H.stack.FlashTransport(o)]
      }
      return i.push(new H.stack.QueueBehavior({
        lazy: o.lazy,
        remove: !0
      })),
      i
    }
    function P(e) {
      for (var t, a = {
        incoming: function(e, t) {
          this.up.incoming(e, t)
        },
        outgoing: function(e, t) {
          this.down.outgoing(e, t)
        },
        callback: function(e) {
          this.up.callback(e)
        },
        init: function() {
          this.down.init()
        },
        destroy: function() {
          this.down.destroy()
        }
      }, o = 0, i = e.length; i > o; o++)
        t = e[o],
        v(t, a, !0),
        0 !== o && (t.down = e[o - 1]),
        o !== i - 1 && (t.up = e[o + 1]);
      return t
    }
    function R(e) {
      e.up.down = e.down,
      e.down.up = e.up,
      e.up = e.down = null
    }
    var T, B, D, A, M, E = this, F = Math.floor(1e4 * Math.random()), x = Function.prototype, q = /^((http.?:)\/\/([^:\/\s]+)(:\d+)*)/, I = /[\-\w]+\/\.\.\//, Y = /([^:])\/\//g, N = "", H = {}, L = e.easyXDM, G = "easyXDM_", z = !1;
    if (n(e, "addEventListener"))
      A = function(e, t, a) {
        e.addEventListener(t, a, !1)
      }
      ,
      M = function(e, t, a) {
        e.removeEventListener(t, a, !1)
      }
      ;
    else {
      if (!n(e, "attachEvent"))
        throw new Error("Browser not supported");
      A = function(e, t, a) {
        e.attachEvent("on" + t, a)
      }
      ,
      M = function(e, t, a) {
        e.detachEvent("on" + t, a)
      }
    }
    var W, O = !1, U = [];
    if ("readyState"in t ? (W = t.readyState,
    O = "complete" == W || ~navigator.userAgent.indexOf("AppleWebKit/") && ("loaded" == W || "interactive" == W)) : O = !!t.body,
    !O) {
      if (n(e, "addEventListener"))
        A(t, "DOMContentLoaded", c);
      else if (A(t, "readystatechange", function() {
        "complete" == t.readyState && c()
      }),
      t.documentElement.doScroll && e === top) {
        var V = function() {
          if (!O) {
            try {
              t.documentElement.doScroll("left")
            } catch (e) {
              return void o(V, 1)
            }
            c()
          }
        };
        V()
      }
      A(e, "load", c)
    }
    var j = function(e) {
      e = e.substring(1).split("&");
      for (var t, a = {}, o = e.length; o--; )
        t = e[o].split("="),
        a[t[0]] = i(t[1]);
      return a
    }(/xdm_e=/.test(a.search) ? a.search : a.hash)
      , J = function() {
      var e = {}
        , t = {
        a: [1, 2, 3]
      }
        , a = '{"a":[1,2,3]}';
      return "undefined" != typeof JSON && "function" == typeof JSON.stringify && JSON.stringify(t).replace(/\s/g, "") === a ? JSON : (Object.toJSON && Object.toJSON(t).replace(/\s/g, "") === a && (e.stringify = Object.toJSON),
      "function" == typeof String.prototype.evalJSON && (t = a.evalJSON(),
      t.a && 3 === t.a.length && 3 === t.a[2] && (e.parse = function(e) {
        return e.evalJSON()
      }
      )),
      e.stringify && e.parse ? (J = function() {
        return e
      }
      ,
      e) : null)
    };
    v(H, {
      version: "2.4.19.3",
      query: j,
      stack: {},
      apply: v,
      getJSONObject: J,
      whenReady: u,
      noConflict: p
    }),
    H.DomHelper = {
      on: A,
      un: M,
      requiresJSON: function(a) {
        s(e, "JSON") || t.write('<script type="text/javascript" src="' + a + '"></' + 'script>')
      }
    },
    function() {
      var e = {};
      H.Fn = {
        set: function(t, a) {
          e[t] = a
        },
        get: function(t, a) {
          if (e.hasOwnProperty(t)) {
            var o = e[t];
            return a && delete e[t],
            o
          }
        }
      }
    }(),
    H.Socket = function(e) {
      var t = P(C(e).concat([{
        incoming: function(t, a) {
          e.onMessage(t, a)
        },
        callback: function(t) {
          e.onReady && e.onReady(t)
        }
      }]))
        , a = g(e.remote);
      this.origin = g(e.remote),
      this.destroy = function() {
        t.destroy()
      }
      ,
      this.postMessage = function(e) {
        t.outgoing(e, a)
      }
      ,
      t.init()
    }
    ,
    H.Rpc = function(e, t) {
      if (t.local)
        for (var a in t.local)
          if (t.local.hasOwnProperty(a)) {
            var o = t.local[a];
            "function" == typeof o && (t.local[a] = {
              method: o
            })
          }
      var i = P(C(e).concat([new H.stack.RpcBehavior(this,t), {
        callback: function(t) {
          e.onReady && e.onReady(t)
        }
      }]));
      this.origin = g(e.remote),
      this.destroy = function() {
        i.destroy()
      }
      ,
      i.init()
    }
    ,
    H.stack.SameOriginTransport = function(e) {
      var t, i, r, n;
      return t = {
        outgoing: function(e, t, a) {
          r(e),
          a && a()
        },
        destroy: function() {
          i && (i.parentNode.removeChild(i),
          i = null)
        },
        onDOMReady: function() {
          n = g(e.remote),
          e.isHost ? (v(e.props, {
            src: y(e.remote, {
              xdm_e: a.protocol + "//" + a.host + a.pathname,
              xdm_c: e.channel,
              xdm_p: 4
            }),
            name: G + e.channel + "_provider"
          }),
          i = S(e),
          H.Fn.set(e.channel, function(e) {
            return r = e,
            o(function() {
              t.up.callback(!0)
            }, 0),
            function(e) {
              t.up.incoming(e, n)
            }
          })) : (r = d().Fn.get(e.channel, !0)(function(e) {
            t.up.incoming(e, n)
          }),
          o(function() {
            t.up.callback(!0)
          }, 0))
        },
        init: function() {
          u(t.onDOMReady, t)
        }
      }
    }
    ,
    H.stack.FlashTransport = function(e) {
      function i(e) {
        o(function() {
          s.up.incoming(e, _)
        }, 0)
      }
      function n(a) {
        var o = e.swf + "?host=" + e.isHost
          , i = "easyXDM_swf_" + Math.floor(1e4 * Math.random());
        H.Fn.set("flash_loaded" + a.replace(/[\-.]/g, "_"), function() {
          H.stack.FlashTransport[a].swf = c = d.firstChild;
          for (var e = H.stack.FlashTransport[a].queue, t = 0; t < e.length; t++)
            e[t]();
          e.length = 0
        }),
        e.swfContainer ? d = "string" == typeof e.swfContainer ? t.getElementById(e.swfContainer) : e.swfContainer : (d = t.createElement("div"),
        v(d.style, D && e.swfNoThrottle ? {
          height: "20px",
          width: "20px",
          position: "fixed",
          right: 0,
          top: 0
        } : {
          height: "1px",
          width: "1px",
          position: "absolute",
          overflow: "hidden",
          right: 0,
          top: 0
        }),
        t.body.appendChild(d));
        var n = "callback=flash_loaded" + r(a.replace(/[\-.]/g, "_")) + "&proto=" + E.location.protocol + "&domain=" + r(h(E.location.href)) + "&port=" + r(m(E.location.href)) + "&ns=" + r(N);
        d.innerHTML = "<object height='20' width='20' type='application/x-shockwave-flash' id='" + i + "' data='" + o + "'><param name='allowScriptAccess' value='always'></param><param name='wmode' value='transparent'><param name='movie' value='" + o + "'></param><param name='flashvars' value='" + n + "'></param><embed type='application/x-shockwave-flash' FlashVars='" + n + "' allowScriptAccess='always' wmode='transparent' src='" + o + "' height='1' width='1'></embed></object>"
      }
      var s, l, _, c, d;
      return s = {
        outgoing: function(t, a, o) {
          c.postMessage(e.channel, t.toString()),
          o && o()
        },
        destroy: function() {
          try {
            c.destroyChannel(e.channel)
          } catch (t) {}
          c = null,
          l && (l.parentNode.removeChild(l),
          l = null)
        },
        onDOMReady: function() {
          _ = e.remote,
          H.Fn.set("flash_" + e.channel + "_init", function() {
            o(function() {
              s.up.callback(!0)
            })
          }),
          H.Fn.set("flash_" + e.channel + "_onMessage", i),
          e.swf = f(e.swf);
          var t = h(e.swf)
            , r = function() {
            H.stack.FlashTransport[t].init = !0,
            c = H.stack.FlashTransport[t].swf,
            c.createChannel(e.channel, e.secret, g(e.remote), e.isHost),
            e.isHost && (D && e.swfNoThrottle && v(e.props, {
              position: "fixed",
              right: 0,
              top: 0,
              height: "20px",
              width: "20px"
            }),
            v(e.props, {
              src: y(e.remote, {
                xdm_e: g(a.href),
                xdm_c: e.channel,
                xdm_p: 6,
                xdm_s: e.secret
              }),
              name: G + e.channel + "_provider"
            }),
            l = S(e))
          };
          H.stack.FlashTransport[t] && H.stack.FlashTransport[t].init ? r() : H.stack.FlashTransport[t] ? H.stack.FlashTransport[t].queue.push(r) : (H.stack.FlashTransport[t] = {
            queue: [r]
          },
          n(t))
        },
        init: function() {
          u(s.onDOMReady, s)
        }
      }
    }
    ,
    H.stack.PostMessageTransport = function(t) {
      function i(e) {
        if (e.origin)
          return g(e.origin);
        if (e.uri)
          return g(e.uri);
        if (e.domain)
          return a.protocol + "//" + e.domain;
        throw "Unable to retrieve the origin of the event"
      }
      function r(e) {
        var a = i(e);
        a == _ && e.data.substring(0, t.channel.length + 1) == t.channel + " " && n.up.incoming(e.data.substring(t.channel.length + 1), a)
      }
      var n, s, l, _;
      return n = {
        outgoing: function(e, a, o) {
          l.postMessage(t.channel + " " + e, a || _),
          o && o()
        },
        destroy: function() {
          M(e, "message", r),
          s && (l = null,
          s.parentNode.removeChild(s),
          s = null)
        },
        onDOMReady: function() {
          if (_ = g(t.remote),
          t.isHost) {
            var i = function(a) {
              a.data == t.channel + "-ready" && (l = "postMessage"in s.contentWindow ? s.contentWindow : s.contentWindow.document,
              M(e, "message", i),
              A(e, "message", r),
              o(function() {
                n.up.callback(!0)
              }, 0))
            };
            A(e, "message", i),
            v(t.props, {
              src: y(t.remote, {
                xdm_e: g(a.href),
                xdm_c: t.channel,
                xdm_p: 1
              }),
              name: G + t.channel + "_provider"
            }),
            s = S(t)
          } else
            A(e, "message", r),
            l = "postMessage"in e.parent ? e.parent : e.parent.document,
            l.postMessage(t.channel + "-ready", _),
            o(function() {
              n.up.callback(!0)
            }, 0)
        },
        init: function() {
          u(n.onDOMReady, n)
        }
      }
    }
    ,
    H.stack.FrameElementTransport = function(i) {
      var r, n, s, l;
      return r = {
        outgoing: function(e, t, a) {
          s.call(this, e),
          a && a()
        },
        destroy: function() {
          n && (n.parentNode.removeChild(n),
          n = null)
        },
        onDOMReady: function() {
          l = g(i.remote),
          i.isHost ? (v(i.props, {
            src: y(i.remote, {
              xdm_e: g(a.href),
              xdm_c: i.channel,
              xdm_p: 5
            }),
            name: G + i.channel + "_provider"
          }),
          n = S(i),
          n.fn = function(e) {
            return delete n.fn,
            s = e,
            o(function() {
              r.up.callback(!0)
            }, 0),
            function(e) {
              r.up.incoming(e, l)
            }
          }
          ) : (t.referrer && g(t.referrer) != j.xdm_e && (e.top.location = j.xdm_e),
          s = e.frameElement.fn(function(e) {
            r.up.incoming(e, l)
          }),
          r.up.callback(!0))
        },
        init: function() {
          u(r.onDOMReady, r)
        }
      }
    }
    ,
    H.stack.NameTransport = function(e) {
      function t(t) {
        var a = e.remoteHelper + (s ? "#_3" : "#_2") + e.channel;
        l.contentWindow.sendMessage(t, a)
      }
      function a() {
        s ? 2 !== ++c && s || n.up.callback(!0) : (t("ready"),
        n.up.callback(!0))
      }
      function i(e) {
        n.up.incoming(e, p)
      }
      function r() {
        d && o(function() {
          d(!0)
        }, 0)
      }
      var n, s, l, _, c, d, p, h;
      return n = {
        outgoing: function(e, a, o) {
          d = o,
          t(e)
        },
        destroy: function() {
          l.parentNode.removeChild(l),
          l = null,
          s && (_.parentNode.removeChild(_),
          _ = null)
        },
        onDOMReady: function() {
          s = e.isHost,
          c = 0,
          p = g(e.remote),
          e.local = f(e.local),
          s ? (H.Fn.set(e.channel, function(t) {
            s && "ready" === t && (H.Fn.set(e.channel, i),
            a())
          }),
          h = y(e.remote, {
            xdm_e: e.local,
            xdm_c: e.channel,
            xdm_p: 2
          }),
          v(e.props, {
            src: h + "#" + e.channel,
            name: G + e.channel + "_provider"
          }),
          _ = S(e)) : (e.remoteHelper = e.remote,
          H.Fn.set(e.channel, i));
          var t = function() {
            var i = l || this;
            M(i, "load", t),
            H.Fn.set(e.channel + "_load", r),
            function n() {
              "function" == typeof i.contentWindow.sendMessage ? a() : o(n, 50)
            }()
          };
          l = S({
            props: {
              src: e.local + "#_4" + e.channel
            },
            onLoad: t
          })
        },
        init: function() {
          u(n.onDOMReady, n)
        }
      }
    }
    ,
    H.stack.HashTransport = function(t) {
      function a(e) {
        if (m) {
          var a = t.remote + "#" + p++ + "_" + e;
          (l || !f ? m.contentWindow : m).location = a
        }
      }
      function i(e) {
        d = e,
        s.up.incoming(d.substring(d.indexOf("_") + 1), y)
      }
      function r() {
        if (h) {
          var e = h.location.href
            , t = ""
            , a = e.indexOf("#");
          -1 != a && (t = e.substring(a)),
          t && t != d && i(t)
        }
      }
      function n() {
        _ = setInterval(r, c)
      }
      var s, l, _, c, d, p, h, m, f, y;
      return s = {
        outgoing: function(e) {
          a(e)
        },
        destroy: function() {
          e.clearInterval(_),
          (l || !f) && m.parentNode.removeChild(m),
          m = null
        },
        onDOMReady: function() {
          if (l = t.isHost,
          c = t.interval,
          d = "#" + t.channel,
          p = 0,
          f = t.useParent,
          y = g(t.remote),
          l) {
            if (v(t.props, {
              src: t.remote,
              name: G + t.channel + "_provider"
            }),
            f)
              t.onLoad = function() {
                h = e,
                n(),
                s.up.callback(!0)
              }
              ;
            else {
              var a = 0
                , i = t.delay / 50;
              !function r() {
                if (++a > i)
                  throw new Error("Unable to reference listenerwindow");
                try {
                  h = m.contentWindow.frames[G + t.channel + "_consumer"]
                } catch (e) {}
                h ? (n(),
                s.up.callback(!0)) : o(r, 50)
              }()
            }
            m = S(t)
          } else
            h = e,
            n(),
            f ? (m = parent,
            s.up.callback(!0)) : (v(t, {
              props: {
                src: t.remote + "#" + t.channel + new Date,
                name: G + t.channel + "_consumer"
              },
              onLoad: function() {
                s.up.callback(!0)
              }
            }),
            m = S(t))
        },
        init: function() {
          u(s.onDOMReady, s)
        }
      }
    }
    ,
    H.stack.ReliableBehavior = function() {
      var e, t, a = 0, o = 0, i = "";
      return e = {
        incoming: function(r, n) {
          var s = r.indexOf("_")
            , l = r.substring(0, s).split(",");
          r = r.substring(s + 1),
          l[0] == a && (i = "",
          t && t(!0)),
          r.length > 0 && (e.down.outgoing(l[1] + "," + a + "_" + i, n),
          o != l[1] && (o = l[1],
          e.up.incoming(r, n)))
        },
        outgoing: function(r, n, s) {
          i = r,
          t = s,
          e.down.outgoing(o + "," + ++a + "_" + r, n)
        }
      }
    }
    ,
    H.stack.QueueBehavior = function(e) {
      function t() {
        if (e.remove && 0 === s.length)
          return void R(a);
        if (!l && 0 !== s.length && !n) {
          l = !0;
          var i = s.shift();
          a.down.outgoing(i.data, i.origin, function(e) {
            l = !1,
            i.callback && o(function() {
              i.callback(e)
            }, 0),
            t()
          })
        }
      }
      var a, n, s = [], l = !0, _ = "", c = 0, u = !1, d = !1;
      return a = {
        init: function() {
          b(e) && (e = {}),
          e.maxLength && (c = e.maxLength,
          d = !0),
          e.lazy ? u = !0 : a.down.init()
        },
        callback: function(e) {
          l = !1;
          var o = a.up;
          t(),
          o.callback(e)
        },
        incoming: function(t, o) {
          if (d) {
            var r = t.indexOf("_")
              , n = parseInt(t.substring(0, r), 10);
            _ += t.substring(r + 1),
            0 === n && (e.encode && (_ = i(_)),
            a.up.incoming(_, o),
            _ = "")
          } else
            a.up.incoming(t, o)
        },
        outgoing: function(o, i, n) {
          e.encode && (o = r(o));
          var l, _ = [];
          if (d) {
            for (; 0 !== o.length; )
              l = o.substring(0, c),
              o = o.substring(l.length),
              _.push(l);
            for (; l = _.shift(); )
              s.push({
                data: _.length + "_" + l,
                origin: i,
                callback: 0 === _.length ? n : null
              })
          } else
            s.push({
              data: o,
              origin: i,
              callback: n
            });
          u ? a.down.init() : t()
        },
        destroy: function() {
          n = !0,
          a.down.destroy()
        }
      }
    }
    ,
    H.stack.VerifyBehavior = function(e) {
      function t() {
        o = Math.random().toString(16).substring(2),
        a.down.outgoing(o)
      }
      var a, o, i;
      return a = {
        incoming: function(r, n) {
          var s = r.indexOf("_");
          -1 === s ? r === o ? a.up.callback(!0) : i || (i = r,
          e.initiate || t(),
          a.down.outgoing(r)) : r.substring(0, s) === i && a.up.incoming(r.substring(s + 1), n)
        },
        outgoing: function(e, t, i) {
          a.down.outgoing(o + "_" + e, t, i)
        },
        callback: function() {
          e.initiate && t()
        }
      }
    }
    ,
    H.stack.RpcBehavior = function(e, t) {
      function a(e) {
        e.jsonrpc = "2.0",
        r.down.outgoing(n.stringify(e))
      }
      function o(e, t) {
        var o = Array.prototype.slice;
        return function() {
          var i, r = arguments.length, n = {
            method: t
          };
          r > 0 && "function" == typeof arguments[r - 1] ? (r > 1 && "function" == typeof arguments[r - 2] ? (i = {
            success: arguments[r - 2],
            error: arguments[r - 1]
          },
          n.params = o.call(arguments, 0, r - 2)) : (i = {
            success: arguments[r - 1]
          },
          n.params = o.call(arguments, 0, r - 1)),
          _["" + ++s] = i,
          n.id = s) : n.params = o.call(arguments, 0),
          e.namedParams && 1 === n.params.length && (n.params = n.params[0]),
          a(n)
        }
      }
      function i(e, t, o, i) {
        if (!o)
          return void (t && a({
            id: t,
            error: {
              code: -32601,
              message: "Procedure not found."
            }
          }));
        var r, n;
        t ? (r = function(e) {
          r = x,
          a({
            id: t,
            result: e
          })
        }
        ,
        n = function(e, o) {
          n = x;
          var i = {
            id: t,
            error: {
              code: -32099,
              message: e
            }
          };
          o && (i.error.data = o),
          a(i)
        }
        ) : r = n = x,
        l(i) || (i = [i]);
        try {
          var s = o.method.apply(o.scope, i.concat([r, n]));
          b(s) || r(s)
        } catch (_) {
          n(_.message)
        }
      }
      var r, n = t.serializer || J(), s = 0, _ = {};
      return r = {
        incoming: function(e) {
          var o = n.parse(e);
          if (o.method)
            t.handle ? t.handle(o, a) : i(o.method, o.id, t.local[o.method], o.params);
          else {
            var r = _[o.id];
            o.error ? r.error && r.error(o.error) : r.success && r.success(o.result),
            delete _[o.id]
          }
        },
        init: function() {
          if (t.remote)
            for (var a in t.remote)
              t.remote.hasOwnProperty(a) && (e[a] = o(t.remote[a], a));
          r.down.init()
        },
        destroy: function() {
          for (var a in t.remote)
            t.remote.hasOwnProperty(a) && e.hasOwnProperty(a) && delete e[a];
          r.down.destroy()
        }
      }
    }
    ,
    E.easyXDM = H
  }(window, document, location, window.setTimeout, decodeURIComponent, encodeURIComponent),
  setParentOrigin = function(e) {
    window.parent_origin || (window.parent_origin = e.origin)
  }
  ;
  var frameHeight = 0;
  window.updateHeight = function(e, t) {
    if (t = t || window.parent_origin) {
      var a = document.getElementsByTagName("html")[0];
      a.style.overflow = "hidden",
      frameHeight = document.body.offsetHeight,
      a.style.overflow = "visible",
      e.postMessage(frameHeight + 25, t),
      e.postMessage({
        height: frameHeight + 25,
        type: "resize"
      }, t)
    }
  }
  ,
  window.updateScrollHeight = function(e, t) {
    if (t = t || window.parent_origin) {
      var a = document.getElementsByTagName("html")[0];
      a.style.overflow = "hidden",
      frameHeight = document.body.scrollHeight,
      a.style.overflow = "visible",
      e.postMessage(frameHeight + 25, t),
      e.postMessage({
        height: frameHeight + 25,
        type: "resize"
      }, t)
    }
  }
  ;
  var receiveMessage = function(e) {
    return "resizeWidget" === e.data || "resizeWidget" === e.data.type ? (setParentOrigin(e),
    window.updateHeight(e.source)) : void 0
  };
  window.addEventListener ? window.addEventListener("message", receiveMessage, !1) : window.attachEvent && window.attachEvent("onmessage", receiveMessage),
  window.updateUrl = function(e, t, a) {
    var t = t || window.parent_origin;
    t && e.postMessage({
      type: "stateUpdate",
      state: a
    }, t)
  }
  ;
  var receiveMessage = function(e) {
    "setParentOrigin" === e.data.type && setParentOrigin(e)
  };
  window.addEventListener ? window.addEventListener("message", receiveMessage, !1) : window.attachEvent && window.attachEvent("onmessage", receiveMessage),
  function(e, t) {
    "function" == typeof define && define.amd ? define("i18n", function() {
      return t(e)
    }) : "object" == typeof module && module.exports ? module.exports = t(e) : e.I18n = t(e)
  }(this, function(e) {
    "use strict";
    var t = e && e.I18n || {}
      , a = Array.prototype.slice
      , o = function(e) {
      return ("0" + e.toString()).substr(-2)
    }
      , i = function(e, t) {
      return p("round", e, -t).toFixed(t)
    }
      , r = function(e) {
      var t = typeof e;
      return "function" === t || "object" === t
    }
      , n = function(e) {
      var t = typeof e;
      return "function" === t
    }
      , s = function(e) {
      return "undefined" != typeof e && null !== e
    }
      , l = function(e) {
      return Array.isArray ? Array.isArray(e) : "[object Array]" === Object.prototype.toString.call(e)
    }
      , _ = function(e) {
      return "string" == typeof e || "[object String]" === Object.prototype.toString.call(e)
    }
      , c = function(e) {
      return "number" == typeof e || "[object Number]" === Object.prototype.toString.call(e)
    }
      , u = function(e) {
      return e === !0 || e === !1
    }
      , d = function(e) {
      return null === e
    }
      , p = function(e, t, a) {
      return "undefined" == typeof a || 0 === +a ? Math[e](t) : (t = +t,
      a = +a,
      isNaN(t) || "number" != typeof a || a % 1 !== 0 ? 0 / 0 : (t = t.toString().split("e"),
      t = Math[e](+(t[0] + "e" + (t[1] ? +t[1] - a : -a))),
      t = t.toString().split("e"),
      +(t[0] + "e" + (t[1] ? +t[1] + a : a))))
    }
      , h = function(e, t) {
      return n(e) ? e(t) : e
    }
      , m = function(e, t) {
      var a, o;
      for (a in t)
        t.hasOwnProperty(a) && (o = t[a],
        _(o) || c(o) || u(o) || l(o) || d(o) ? e[a] = o : (null == e[a] && (e[a] = {}),
        m(e[a], o)));
      return e
    }
      , g = {
      day_names: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      abbr_day_names: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      month_names: [null, "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      abbr_month_names: [null, "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      meridian: ["AM", "PM"]
    }
      , f = {
      precision: 3,
      separator: ".",
      delimiter: ",",
      strip_insignificant_zeros: !1
    }
      , y = {
      unit: "$",
      precision: 2,
      format: "%u%n",
      sign_first: !0,
      delimiter: ",",
      separator: "."
    }
      , b = {
      unit: "%",
      precision: 3,
      format: "%n%u",
      separator: ".",
      delimiter: ""
    }
      , v = [null, "kb", "mb", "gb", "tb"]
      , w = {
      defaultLocale: "en",
      locale: "en",
      defaultSeparator: ".",
      placeholder: /(?:\{\{|%\{)(.*?)(?:\}\}?)/gm,
      fallbacks: !1,
      translations: {},
      missingBehaviour: "message",
      missingTranslationPrefix: ""
    };
    return t.reset = function() {
      var e;
      for (e in w)
        this[e] = w[e]
    }
    ,
    t.initializeOptions = function() {
      var e;
      for (e in w)
        s(this[e]) || (this[e] = w[e])
    }
    ,
    t.initializeOptions(),
    t.locales = {},
    t.locales.get = function(e) {
      var a = this[e] || this[t.locale] || this["default"];
      return n(a) && (a = a(e)),
      l(a) === !1 && (a = [a]),
      a
    }
    ,
    t.locales["default"] = function(e) {
      var a = []
        , o = [];
      return e && a.push(e),
      !e && t.locale && a.push(t.locale),
      t.fallbacks && t.defaultLocale && a.push(t.defaultLocale),
      a.forEach(function(e) {
        var a = e.split("-")
          , i = null
          , r = null;
        3 === a.length ? (i = [a[0], a[1]].join("-"),
        r = a[0]) : 2 === a.length && (i = a[0]),
        -1 === o.indexOf(e) && o.push(e),
        t.fallbacks && [i, r].forEach(function(t) {
          "undefined" != typeof t && null !== t && t !== e && -1 === o.indexOf(t) && o.push(t)
        })
      }),
      a.length || a.push("en"),
      o
    }
    ,
    t.pluralization = {},
    t.pluralization.get = function(e) {
      return this[e] || this[t.locale] || this["default"]
    }
    ,
    t.pluralization["default"] = function(e) {
      switch (e) {
      case 0:
        return ["zero", "other"];
      case 1:
        return ["one"];
      default:
        return ["other"]
      }
    }
    ,
    t.currentLocale = function() {
      return this.locale || this.defaultLocale
    }
    ,
    t.isSet = s,
    t.lookup = function(e, t) {
      t = t || {};
      var a, o, i, r, n = this.locales.get(t.locale).slice();
      for (i = this.getFullScope(e, t); n.length; )
        if (a = n.shift(),
        o = i.split(this.defaultSeparator),
        r = this.translations[a]) {
          for (; o.length && (r = r[o.shift()],
          void 0 !== r && null !== r); )
            ;
          if (void 0 !== r && null !== r)
            return r
        }
      return s(t.defaultValue) ? h(t.defaultValue, e) : void 0
    }
    ,
    t.pluralizationLookupWithoutFallback = function(e, t, a) {
      var o, i, n = this.pluralization.get(t), l = n(e);
      if (r(a))
        for (; l.length; )
          if (o = l.shift(),
          s(a[o])) {
            i = a[o];
            break
          }
      return i
    }
    ,
    t.pluralizationLookup = function(e, t, a) {
      a = a || {};
      var o, i, n, l, _ = this.locales.get(a.locale).slice();
      for (t = this.getFullScope(t, a); _.length; )
        if (o = _.shift(),
        i = t.split(this.defaultSeparator),
        n = this.translations[o]) {
          for (; i.length && (n = n[i.shift()],
          r(n)); )
            0 == i.length && (l = this.pluralizationLookupWithoutFallback(e, o, n));
          if (null != l && void 0 != l)
            break
        }
      return (null == l || void 0 == l) && s(a.defaultValue) && (l = r(a.defaultValue) ? this.pluralizationLookupWithoutFallback(e, a.locale, a.defaultValue) : a.defaultValue,
      n = a.defaultValue),
      {
        message: l,
        translations: n
      }
    }
    ,
    t.meridian = function() {
      var e = this.lookup("time")
        , t = this.lookup("date");
      return e && e.am && e.pm ? [e.am, e.pm] : t && t.meridian ? t.meridian : g.meridian
    }
    ,
    t.prepareOptions = function() {
      for (var e, t = a.call(arguments), o = {}; t.length; )
        if (e = t.shift(),
        "object" == typeof e)
          for (var i in e)
            e.hasOwnProperty(i) && (s(o[i]) || (o[i] = e[i]));
      return o
    }
    ,
    t.createTranslationOptions = function(e, t) {
      var a = [{
        scope: e
      }];
      return s(t.defaults) && (a = a.concat(t.defaults)),
      s(t.defaultValue) && a.push({
        message: t.defaultValue
      }),
      a
    }
    ,
    t.translate = function(e, t) {
      t = t || {};
      var a, o = this.createTranslationOptions(e, t), i = e, n = this.prepareOptions(t);
      delete n.defaultValue;
      var _ = o.some(function(t) {
        return s(t.scope) ? (i = t.scope,
        a = this.lookup(i, n)) : s(t.message) && (a = h(t.message, e)),
        void 0 !== a && null !== a ? !0 : void 0
      }, this);
      return _ ? ("string" == typeof a ? a = this.interpolate(a, t) : l(a) ? a = a.map(function(e) {
        return "string" == typeof e ? this.interpolate(e, t) : e
      }, this) : r(a) && s(t.count) && (a = this.pluralize(t.count, i, t)),
      a) : this.missingTranslation(e, t)
    }
    ,
    t.interpolate = function(e, t) {
      if (null === e)
        return e;
      t = t || {};
      var a, o, i, r, n = e.match(this.placeholder);
      if (!n)
        return e;
      for (var o; n.length; )
        a = n.shift(),
        i = a.replace(this.placeholder, "$1"),
        o = s(t[i]) ? t[i].toString().replace(/\$/gm, "_#$#_") : i in t ? this.nullPlaceholder(a, e, t) : this.missingPlaceholder(a, e, t),
        r = new RegExp(a.replace(/\{/gm, "\\{").replace(/\}/gm, "\\}")),
        e = e.replace(r, o);
      return e.replace(/_#\$#_/g, "$")
    }
    ,
    t.pluralize = function(e, t, a) {
      a = this.prepareOptions({
        count: String(e)
      }, a);
      var o, i;
      return i = this.pluralizationLookup(e, t, a),
      void 0 == i.translations || null == i.translations ? this.missingTranslation(t, a) : void 0 != i.message && null != i.message ? this.interpolate(i.message, a) : (o = this.pluralization.get(a.locale),
      this.missingTranslation(t + "." + o(e)[0], a))
    }
    ,
    t.missingTranslation = function(e, t) {
      if ("guess" == this.missingBehaviour) {
        var a = e.split(".").slice(-1)[0];
        return (this.missingTranslationPrefix.length > 0 ? this.missingTranslationPrefix : "") + a.replace("_", " ").replace(/([a-z])([A-Z])/g, function(e, t, a) {
          return t + " " + a.toLowerCase()
        })
      }
      var o = null != t && null != t.locale ? t.locale : this.currentLocale()
        , i = this.getFullScope(e, t)
        , r = [o, i].join(this.defaultSeparator);
      return '[missing "' + r + '" translation]'
    }
    ,
    t.missingPlaceholder = function(e) {
      return "[missing " + e + " value]"
    }
    ,
    t.nullPlaceholder = function() {
      return t.missingPlaceholder.apply(t, arguments)
    }
    ,
    t.toNumber = function(e, t) {
      t = this.prepareOptions(t, this.lookup("number.format"), f);
      var a, o, r = 0 > e, n = i(Math.abs(e), t.precision).toString(), s = n.split("."), l = [], _ = t.format || "%n", c = r ? "-" : "";
      for (e = s[0],
      a = s[1]; e.length > 0; )
        l.unshift(e.substr(Math.max(0, e.length - 3), 3)),
        e = e.substr(0, e.length - 3);
      return o = l.join(t.delimiter),
      t.strip_insignificant_zeros && a && (a = a.replace(/0+$/, "")),
      t.precision > 0 && a && (o += t.separator + a),
      _ = t.sign_first ? "%s" + _ : _.replace("%n", "%s%n"),
      o = _.replace("%u", t.unit).replace("%n", o).replace("%s", c)
    }
    ,
    t.toCurrency = function(e, t) {
      return t = this.prepareOptions(t, this.lookup("number.currency.format"), this.lookup("number.format"), y),
      this.toNumber(e, t)
    }
    ,
    t.localize = function(e, t, a) {
      switch (a || (a = {}),
      e) {
      case "currency":
        return this.toCurrency(t);
      case "number":
        return e = this.lookup("number.format"),
        this.toNumber(t, e);
      case "percentage":
        return this.toPercentage(t);
      default:
        var o;
        return o = e.match(/^(date|time)/) ? this.toTime(e, t) : t.toString(),
        this.interpolate(o, a)
      }
    }
    ,
    t.parseDate = function(e) {
      var t, a, o;
      if ("object" == typeof e)
        return e;
      if (t = e.toString().match(/(\d{4})-(\d{2})-(\d{2})(?:[ T](\d{2}):(\d{2}):(\d{2})([\.,]\d{1,3})?)?(Z|\+00:?00)?/)) {
        for (var i = 1; 6 >= i; i++)
          t[i] = parseInt(t[i], 10) || 0;
        t[2] -= 1,
        o = t[7] ? 1e3 * ("0" + t[7]) : null,
        a = t[8] ? new Date(Date.UTC(t[1], t[2], t[3], t[4], t[5], t[6], o)) : new Date(t[1],t[2],t[3],t[4],t[5],t[6],o)
      } else
        "number" == typeof e ? (a = new Date,
        a.setTime(e)) : e.match(/([A-Z][a-z]{2}) ([A-Z][a-z]{2}) (\d+) (\d+:\d+:\d+) ([+-]\d+) (\d+)/) ? (a = new Date,
        a.setTime(Date.parse([RegExp.$1, RegExp.$2, RegExp.$3, RegExp.$6, RegExp.$4, RegExp.$5].join(" ")))) : e.match(/\d+ \d+:\d+:\d+ [+-]\d+ \d+/) ? (a = new Date,
        a.setTime(Date.parse(e))) : (a = new Date,
        a.setTime(Date.parse(e)));
      return a
    }
    ,
    t.strftime = function(e, a) {
      var i = this.lookup("date")
        , r = t.meridian();
      if (i || (i = {}),
      i = this.prepareOptions(i, g),
      isNaN(e.getTime()))
        throw new Error("I18n.strftime() requires a valid date object, but received an invalid date.");
      var n = e.getDay()
        , s = e.getDate()
        , l = e.getFullYear()
        , _ = e.getMonth() + 1
        , c = e.getHours()
        , u = c
        , d = c > 11 ? 1 : 0
        , p = e.getSeconds()
        , h = e.getMinutes()
        , m = e.getTimezoneOffset()
        , f = Math.floor(Math.abs(m / 60))
        , y = Math.abs(m) - 60 * f
        , b = (m > 0 ? "-" : "+") + (f.toString().length < 2 ? "0" + f : f) + (y.toString().length < 2 ? "0" + y : y);
      return u > 12 ? u -= 12 : 0 === u && (u = 12),
      a = a.replace("%a", i.abbr_day_names[n]),
      a = a.replace("%A", i.day_names[n]),
      a = a.replace("%b", i.abbr_month_names[_]),
      a = a.replace("%B", i.month_names[_]),
      a = a.replace("%d", o(s)),
      a = a.replace("%e", s),
      a = a.replace("%-d", s),
      a = a.replace("%H", o(c)),
      a = a.replace("%-H", c),
      a = a.replace("%I", o(u)),
      a = a.replace("%-I", u),
      a = a.replace("%m", o(_)),
      a = a.replace("%-m", _),
      a = a.replace("%M", o(h)),
      a = a.replace("%-M", h),
      a = a.replace("%p", r[d]),
      a = a.replace("%S", o(p)),
      a = a.replace("%-S", p),
      a = a.replace("%w", n),
      a = a.replace("%y", o(l)),
      a = a.replace("%-y", o(l).replace(/^0+/, "")),
      a = a.replace("%Y", l),
      a = a.replace("%z", b)
    }
    ,
    t.toTime = function(e, t) {
      var a = this.parseDate(t)
        , o = this.lookup(e);
      return a.toString().match(/invalid/i) ? a.toString() : o ? this.strftime(a, o) : a.toString()
    }
    ,
    t.toPercentage = function(e, t) {
      return t = this.prepareOptions(t, this.lookup("number.percentage.format"), this.lookup("number.format"), b),
      this.toNumber(e, t)
    }
    ,
    t.toHumanSize = function(e, t) {
      for (var a, o, i = 1024, r = e, n = 0; r >= i && 4 > n; )
        r /= i,
        n += 1;
      return 0 === n ? (a = this.t("number.human.storage_units.units.byte", {
        count: r
      }),
      o = 0) : (a = this.t("number.human.storage_units.units." + v[n]),
      o = r - Math.floor(r) === 0 ? 0 : 1),
      t = this.prepareOptions(t, {
        unit: a,
        precision: o,
        format: "%n%u",
        delimiter: ""
      }),
      this.toNumber(r, t)
    }
    ,
    t.getFullScope = function(e, t) {
      return t = t || {},
      l(e) && (e = e.join(this.defaultSeparator)),
      t.scope && (e = [t.scope, e].join(this.defaultSeparator)),
      e
    }
    ,
    t.extend = function(e, t) {
      return "undefined" == typeof e && "undefined" == typeof t ? {} : m(e, t)
    }
    ,
    t.t = t.translate,
    t.l = t.localize,
    t.p = t.pluralize,
    t
  }),
  Array.prototype.indexOf || (Array.prototype.indexOf = function(e) {
    "use strict";
    if (null == this)
      throw new TypeError;
    var t = Object(this)
      , a = t.length >>> 0;
    if (0 === a)
      return -1;
    var o = 0;
    if (arguments.length > 1 && (o = Number(arguments[1]),
    o != o ? o = 0 : 0 != o && 1 / 0 != o && o != -1 / 0 && (o = (o > 0 || -1) * Math.floor(Math.abs(o)))),
    o >= a)
      return -1;
    for (var i = o >= 0 ? o : Math.max(a - Math.abs(o), 0); a > i; i++)
      if (i in t && t[i] === e)
        return i;
    return -1
  }
  ),
  Array.prototype.forEach || (Array.prototype.forEach = function(e, t) {
    var a, o;
    if (null == this)
      throw new TypeError("this is null or not defined");
    var i = Object(this)
      , r = i.length >>> 0;
    if ("[object Function]" !== {}.toString.call(e))
      throw new TypeError(e + " is not a function");
    for (t && (a = t),
    o = 0; r > o; ) {
      var n;
      Object.prototype.hasOwnProperty.call(i, o) && (n = i[o],
      e.call(a, n, o, i)),
      o++
    }
  }
  ),
  Array.prototype.some || (Array.prototype.some = function(e) {
    "use strict";
    if (void 0 === this || null === this)
      throw new TypeError;
    var t = Object(this)
      , a = t.length >>> 0;
    if ("function" != typeof e)
      throw new TypeError;
    for (var o = arguments.length >= 2 ? arguments[1] : void 0, i = 0; a > i; i++)
      if (i in t && e.call(o, t[i], i, t))
        return !0;
    return !1
  }
  ),
  Array.prototype.map || (Array.prototype.map = function(e) {
    var t, a, o;
    if (null == this)
      throw new TypeError("this is null or not defined");
    var i = Object(this)
      , r = i.length >>> 0;
    if ("function" != typeof e)
      throw new TypeError(e + " is not a function");
    for (arguments.length > 1 && (t = arguments[1]),
    a = new Array(r),
    o = 0; r > o; ) {
      var n, s;
      o in i && (n = i[o],
      s = e.call(t, n, o, i),
      a[o] = s),
      o++
    }
    return a
  }
  ),
  function(e, t) {
    "function" == typeof define && define.amd ? define(["i18n"], t) : t("object" == typeof module && module.exports ? require("i18n") : e.I18n)
  }(this, function(e) {
    "use strict";
    e.translations = {
      en: {
        "1st_pax_price": "1st Pax Price",
        "2nd_pax_price": "2nd Pax Price",
        Africa: "Africa",
        Alaska: "US (Alaska)",
        Amazon: "Amazon",
        Antarctica: "Antarctica",
        Arctic: "Arctic",
        Asia: "Asia",
        "Atlantic Islands": "Atlantic Islands",
        "Australia & New Zealand": "Australia & New Zealand",
        "Black Sea": "Black Sea",
        Brahmaputra: "Brahmaputra",
        "Caledonian Canal": "Caledonian Canal",
        Canada: "Canada",
        Caribbean: "Caribbean",
        Chobe: "Chobe",
        "Columbia and Snake": "Columbia and Snake",
        Danube: "Danube",
        Dnieper: "Dnieper",
        Dordogne: "Dordogne",
        Douro: "Douro",
        "Dutch Waterways": "Dutch Waterways",
        "East Coast US": "US (East Coast)",
        "Eastern Europe": "Europe (East)",
        Elbe: "Elbe",
        "Europe (Mediterranean)": "Europe (Mediterranean)",
        "Europe (North)": "Europe (North)",
        "Europe (West)": "Europe (West)",
        "French Canals": "French Canals",
        Ganges: "Ganges",
        Garonne: "Garonne",
        Gironde: "Gironde",
        Guadalquivir: "Guadalquivir",
        Guadiana: "Guadiana",
        "Indian Ocean": "Indian Ocean",
        Irrawaddy: "Irrawaddy",
        Kerala: "Kerala",
        Loire: "Loire",
        Magdalena: "Magdalena",
        Main: "Main",
        Marne: "Marne",
        Mediterranean: "Europe (Mediterranean)",
        Mekong: "Mekong",
        Meuse: "Meuse",
        "Middle East": "Middle East",
        Mississippi: "Mississippi",
        Moselle: "Moselle",
        Mystery: "Mystery Cruise",
        "Mystery Cruise": "Mystery",
        Nile: "Nile",
        "Norther Europe": "Europe (North)",
        "Northern Europe": "Europe (North)",
        Oder: "Oder",
        Pacific: "Pacific",
        "Panama Canal": "Panama Canal",
        Po: "Po",
        Repositioning: "Repositioning",
        Rhine: "Rhine",
        Rhone: "Rhone",
        "Russian Waterways": "Russian Waterways",
        Saone: "Saone",
        Seine: "Seine",
        Shannon: "Shannon",
        "South America": "South America",
        Thames: "Thames",
        Transatlantic: "Transatlantic",
        "US (Alaska)": "US (Alaska)",
        "US (East Coast)": "US (East Coast)",
        "US (West Coast)": "US (West Coast)",
        "West Coast US": "US (West Coast)",
        "Western Europe": "Europe (West)",
        "World-wide": "World-wide",
        Yangtze: "Yangtze",
        Zambezi: "Zambezi",
        accept: "Accept",
        actions: "Actions",
        activerecord: {
          attributes: {
            event: {
              title: "Event title"
            },
            page: {
              cover_image: "Cover photo",
              profile_image: "Profile picture",
              title: "Title"
            },
            place: {
              country_code: "Country",
              county_state: "County / State",
              postcode: "Postcode",
              street_address: "Street Address",
              title: "Place name",
              town_city: "Town / City"
            },
            promotion: {
              title: "Promotion title"
            },
            ship: {
              ship_class: "Class",
              ship_type: "Type",
              title: "Ship name"
            },
            widget: {
              limit: "Max items",
              title: "Widget name",
              widget_type: "Widget type"
            }
          },
          errors: {
            messages: {
              already_confirmed: "was already confirmed",
              record_invalid: "Validation failed: %{errors}",
              restrict_dependent_destroy: {
                many: "Cannot delete record because dependent %{record} exist",
                one: "Cannot delete record because a dependent %{record} exists"
              }
            },
            models: {
              place: {
                attributes: {
                  latitude: {
                    blank: "can't be blank, please enter manually"
                  },
                  longitude: {
                    blank: "can't be blank, please enter manually"
                  }
                }
              }
            }
          },
          models: {
            attachment: {
              one: "Attachment",
              other: "Attachments"
            },
            event: {
              one: "Event",
              other: "Events"
            },
            gallery: {
              one: "Gallery",
              other: "Galleries"
            },
            operator: {
              one: "Operator",
              other: "Operators"
            },
            page: {
              one: "Page",
              other: "Pages"
            },
            place: {
              one: "Place",
              other: "Places"
            },
            promotion: {
              one: "Promotion",
              other: "Promotions"
            },
            ship: {
              one: "Ship",
              other: "Ships"
            },
            user: {
              one: "User",
              other: "Users"
            },
            "widgets/widget": {
              one: "Widget",
              other: "Widgets"
            }
          }
        },
        admin: {
          actions: {
            bulk_delete: {
              breadcrumb: "Multiple delete",
              bulk_link: "Delete selected %{model_label_plural}",
              menu: "Multiple delete",
              title: "Delete %{model_label_plural}"
            },
            clone: {
              breadcrumb: "Clone",
              menu: "Clone",
              title: "Clone"
            },
            dashboard: {
              breadcrumb: "Dashboard",
              menu: "Dashboard",
              title: "Site Administration"
            },
            "delete": {
              breadcrumb: "Delete",
              done: "deleted",
              link: "Delete '%{object_label}'",
              menu: "Delete",
              title: "Delete %{model_label} '%{object_label}'"
            },
            edit: {
              breadcrumb: "Edit",
              done: "updated",
              link: "Edit this %{model_label}",
              menu: "Edit",
              title: "Edit %{model_label} '%{object_label}'"
            },
            edit_page: {
              breadcrumb: "edit_page",
              menu: "Edit page",
              title: "Edit page"
            },
            "export": {
              breadcrumb: "Export",
              bulk_link: "Export selected %{model_label_plural}",
              done: "exported",
              link: "Export found %{model_label_plural}",
              menu: "Export",
              title: "Export %{model_label_plural}"
            },
            history_index: {
              breadcrumb: "History",
              menu: "History",
              title: "History for %{model_label_plural}"
            },
            history_show: {
              breadcrumb: "History",
              menu: "History",
              title: "History for %{model_label} '%{object_label}'"
            },
            index: {
              breadcrumb: "%{model_label_plural}",
              menu: "List",
              title: "List of %{model_label_plural}"
            },
            "new": {
              breadcrumb: "New",
              done: "created",
              link: "Add a new %{model_label}",
              menu: "Add new",
              title: "New %{model_label}"
            },
            show: {
              breadcrumb: "%{object_label}",
              menu: "Show",
              title: "Details for %{model_label} '%{object_label}'"
            },
            show_in_app: {
              menu: "Show in app"
            },
            synchronize_maps: {
              breadcrumb: "Synchronize Maps",
              menu: "Synchronize Maps",
              title: "Synchronize Maps"
            }
          },
          "export": {
            click_to_reverse_selection: "Click to reverse selection",
            confirmation: "Export to %{name}",
            csv: {
              col_sep: "Column separator",
              col_sep_help: "Leave blank for default ('%{value}')",
              default_col_sep: ",",
              encoding_to: "Encode to",
              encoding_to_help: "Choose output encoding. Leave empty to let current input encoding untouched: (%{name})",
              header_for_association_methods: "%{name} [%{association}]",
              header_for_root_methods: "%{name}",
              skip_header: "No header",
              skip_header_help: "Do not output a header (no fields description)"
            },
            display: "Display %{name}: %{type}",
            empty_value_for_associated_objects: "<empty>",
            fields_from: "Fields from %{name}",
            fields_from_associated: "Fields from associated %{name}",
            options_for: "Options for %{name}",
            select: "Select fields to export",
            select_all_fields: "Select All Fields"
          },
          flash: {
            error: "%{name} failed to be %{action}",
            model_not_found: "Model '%{model}' could not be found",
            noaction: "No actions were taken",
            object_not_found: "%{model} with id '%{id}' could not be found",
            successful: "%{name} successfully %{action}"
          },
          form: {
            all_of_the_following_related_items_will_be_deleted: "? The following related items may be deleted or orphaned:",
            are_you_sure_you_want_to_delete_the_object: "Are you sure you want to delete this %{model_name}",
            basic_info: "Basic info",
            bulk_delete: "The following objects will be deleted, which may delete or orphan some of their related dependencies:",
            cancel: "Cancel",
            char_length_of: "length of",
            char_length_up_to: "length up to",
            confirmation: "Yes, I'm sure",
            new_model: "%{name} (new)",
            one_char: "character",
            optional: "Optional",
            required: "Required",
            save: "Save",
            save_and_add_another: "Save and add another",
            save_and_edit: "Save and edit"
          },
          home: {
            name: "Home"
          },
          js: {
            between_and_: "Between ... and ...",
            contains: "Contains",
            date: "Date ...",
            ends_with: "Ends with",
            "false": !1,
            is_blank: "Is blank",
            is_exactly: "Is exactly",
            is_present: "Is present",
            last_week: "Last week",
            no_objects: "No objects found",
            number: "Number ...",
            starts_with: "Starts with",
            this_week: "This week",
            today: "Today",
            too_many_objects: "Too many objects, use search box above",
            "true": !0,
            yesterday: "Yesterday"
          },
          loading: "Loading...",
          misc: {
            add_filter: "Add filter",
            add_new: "Add new",
            ago: "ago",
            bulk_menu_title: "Selected items",
            chose_all: "Choose all",
            chosen: "Chosen %{name}",
            clear_all: "Clear all",
            down: "Down",
            filter: "Filter",
            log_out: "Log out",
            more: "Plus %{count} more %{models_name}",
            navigation: "Navigation",
            navigation_static_label: "Links",
            refresh: "Refresh",
            remove: "Remove",
            search: "Search",
            show_all: "Show all",
            up: "Up"
          },
          pagination: {
            next: "Next &raquo;",
            previous: "&laquo; Prev",
            truncate: "\u2026"
          },
          table_headers: {
            changes: "Changes",
            created_at: "Date/Time",
            item: "Item",
            last_created: "Last created",
            message: "Message",
            model_name: "Model name",
            records: "Records",
            username: "User"
          },
          toggle_navigation: "Toggle navigation"
        },
        adults_only: "Adults Only",
        api: {
          locale_is_required: "The parameter 'locale' is required, you must specify it. Available locales: %{languages}.",
          not_access_to_operator_images: "You do not have access to the destination images for this operator",
          not_found_locales: "The requested language is not available. Available languages: %{languages}.",
          not_found_ship_locales: "The requested language is not available for this ship. Available languages: %{languages}.",
          operator_not_recognised: "Operator ID not recognised"
        },
        apply: "Apply",
        are_you_sure: "Are you sure?",
        are_you_sure_leave: "Are you sure you want to leave this page?",
        attachments: {
          edit: {
            header: "Attachment Details",
            update: "Update Details"
          }
        },
        attachments_copy: "Please check the name of your files for typos. Also make sure to include the name of your\nPage at the beginning so users can easily find them in a Brochure Rack. You can also set a\ndrop-off date to make sure it disappears when you want it to\n",
        attributes: {
          created_at: "Created on",
          email: "Email address",
          end_at: "End on",
          end_at_without_zone: "End on",
          facebook_url: "Facebook URL",
          publish: "Publish on",
          publish_at_without_zone: "Publish on",
          start_at: "Start on",
          start_at_without_zone: "Start on",
          ticketing_info: "Ticketing information",
          ticketing_url: "Ticketing URL",
          twitter_url: "Twitter URL",
          updated_at: "Last updated on",
          video_url: "Video URL",
          website_url: "Website URL"
        },
        availability: {
          availability: "Availability",
          available: "Available",
          fully_booked: "Fully Booked",
          wait_list: "Wait List"
        },
        back: "Back",
        back_to_results: "Back to Results",
        balcony: "Balcony",
        bulk_uploader: {
          step: {
            image_upload: {
              event_promotion: "Please select a logo and a cover image for each of the items below. To make things easier, we have preselected the same images as your Place. You can replace them by clicking on the \u2018Select Image\u2019 button and either select another, or upload a new one in your gallery.",
              place: "Please select a logo and a cover image for each of the items below."
            }
          }
        },
        cabin_grades: "Cabin Grades",
        cabin_grades_list: {
          balcony: "Balcony",
          inside: "Interior",
          outside: "Exterior",
          suite: "Suite"
        },
        cabins: "Cabins",
        cancel: "Cancel",
        check_out: {
          accommodation: "Accommodation",
          check_out_the: "Check out the",
          dining_option: "Dining",
          enrichment: "Enrichment",
          entertainment: "Entertainment",
          health_fitness: "Health & Fitness",
          kid_teen: "Kids & Teens"
        },
        chosen_placeholder_html: "Search for and choose %{name}",
        clear: "Clear",
        clear_all: "Clear all",
        confirm: "Confirm",
        confirmation_pending_html: "<strong>Note:</strong> This %{name} has not yet been verified!",
        create: "Create",
        create_model: "Create a new %{name}",
        create_success: "%{name} was successfully created",
        create_success_unconfirmed: "%{name} was successfully created, but is awaiting verification",
        create_widget: "Embed this %{name}",
        create_widget_code: "Create embed code",
        cruise_line: {
          cruise_line: "Cruise Line",
          select_operator: "Select Operator"
        },
        cruise_tour_search: {
          dining_experience_options: {
            complimentary: "Included",
            cover: "Additional Cost",
            snacks: "Snack & Light Bites"
          },
          dining_food_type_options: {
            African: "African",
            Exclusive: "Exclusive",
            "Food Hall": "Food Hall",
            Greek: "Greek",
            Hawaiian: "Hawaiian",
            Mediterranean: "Mediterranean",
            Mezze: "Mezze",
            Vegetarian: "Vegetarian",
            american: "American",
            asian: "Asian",
            bakery: "Bakery",
            bbq: "BBQ & Grill",
            british: "British",
            brunch: "Brunch",
            buffet: "Buffet",
            cafe: "Caf\xe9",
            caribbean: "Caribbean",
            casual: "Casual",
            chef: "Chef's Table",
            classic: "Classic",
            continental: "Continental",
            "cooking school": "Cooking School",
            fast: "Fast Food",
            fine: "Fine Dining",
            french: "French",
            fusion: "Fusion",
            gastro: "Gastro Pub",
            gelato: "Gelato",
            gourmet: "Gourmet",
            healthy: "Healthy Option",
            ice_cream: "Ice Cream Parlour",
            indian: "Indian",
            international: "International",
            italian: "Italian",
            japanese: "Japanese",
            "korean bbq": "Korean BBQ",
            mexican: "Mexican",
            new_orleans: "New Orleans",
            pacific: "Pacific Rim",
            pizzeria: "Pizzeria",
            regional: "Regionally Inspired",
            room: "Room Service",
            seafood: "Seafood",
            south_american: "South American",
            spanish: "Spanish",
            steakhouse: "Steakhouse",
            surf_turf: "Steak & Seafood",
            sushi: "Sushi",
            tapas: "Tapas",
            themed: "Themed",
            varies: "Varies",
            wine: "Wine & Dine"
          },
          enquiry: {
            call_time: "Select Call Time",
            email: "E-mail",
            first_name: "First Name",
            last_name: "Last Name",
            make_an_enquiry: "Make an Enquiry",
            message: "Message",
            number_of_travellers: "Number of Guests",
            phone: "Phone",
            post_code: "Post Code",
            thank_you_for_your_enquiry: "Thank you for your enquiry, one of our agents will contact you at the requested time.",
            title: "Select Title",
            your_details: "Your Details",
            your_preferences: "Your Preference"
          },
          find_a_holiday: {
            adults_only: "Adults Only",
            dates_travelling: "Dates Travelling",
            destination: "Destination",
            duration: "Duration",
            family_cruises: "Family Cruises",
            from: "From",
            from_price_range: "From",
            holiday_type: "Holiday Type",
            loading: "Loading...",
            operators: "Operators",
            price_range: "Price Range (per person)",
            select_cruise_date: "Select Dates/Month",
            select_destination: "Select Destination",
            select_duration: "Select Duration",
            select_holiday_type: "Select Holiday Type",
            select_operators: "Select Operators",
            select_ships: "Select Ships",
            select_theme: "Select Theme",
            ships: "Ship",
            show_results: "Show Results",
            start_from: "Start From",
            theme: "Theme",
            to: "to",
            to_price_range: "to",
            uk_departures: "UK Departures",
            uk_ireland_departures: "UK & Ireland Departures"
          },
          find_a_ship: {
            cruise_line: "Cruise Line",
            ocean: "Ocean",
            river: "River",
            select_operators: "Select Operator",
            select_ships: "Select Ships",
            ships: "Ship",
            show_results: "Show Results"
          },
          holiday_details: {
            Classic: "Classic",
            Expedition: "Expedition",
            Luxury: "Luxury",
            Premium: "Premium",
            "Premium Resort": "Premium Resort",
            Resort: "Resort",
            "Ultra Luxury": "Ultra Luxury",
            back_to_results: "Back to Results",
            days: "Days",
            details: "Details",
            duration: "Duration",
            end_date: "End Date",
            ends_at: "Ends At",
            from: "From",
            highlights: "Highlights",
            introduction: "Introduction",
            itinerary: {
              arrive: "Arrive",
              cruise: "Cruise",
              day: "Days",
              depart: "Depart",
              flight: "Flight",
              itinerary: "Itinerary",
              land: "Land"
            },
            pricing: {
              "1st_person_price": "1st Person Price",
              "2nd_person_price": "2nd Person Price",
              availability: "Availability",
              available: "Available",
              balcony: "Balcony",
              cabin_grade: "Cabin Categories",
              cabin_type: "Cabin Type",
              closed: "Closed",
              double_price_pp: "Double Price PP",
              enquire: "Enquire",
              from: "From",
              fully_booked: "Fully Booked",
              guarantee: "Guarantee",
              inside: "Inside",
              outside: "Oceanview",
              pricing: "Pricing",
              room: "Room",
              single_price: "Single Price",
              suite: "Suite",
              wait_list: "Waitlist"
            },
            region: "Region",
            ship_name: "Ship Name",
            start_date: "Start Date",
            starts_at: "Starts At",
            style: "Style",
            theme: "Theme",
            view_ship: "View Ship",
            whats_included: "What's included"
          },
          search_results: {
            clear_all: "Clear All",
            days: "Days",
            from: "From",
            learn_more: "Learn More",
            per_person: "Per Person",
            search_results: "Search Results",
            view_or_amend_search: "View or Amend Search",
            view_ship: "View Ship"
          },
          ship_details: {
            about_ship: "About",
            accommodation: "Staterooms",
            back_to_overview: "Back to Overview",
            check_out: {
              accommodation: "Staterooms",
              check_out_the: "Check Out The",
              deckplans: "Deckplans",
              dining: "Dining",
              dining_experience: "Experience",
              dining_food: "Food",
              enrichment: "Enrichment",
              entertainment: "Entertainment",
              health_fitness: "Health & Fitness",
              useful_to_know: "Useful to Know",
              younger_travellers: "Facilities for Younger Travellers"
            },
            deckplans: "Deckplans",
            dining: "Dining",
            enrichment: "Enrichment",
            entertainment: "Entertainment",
            health_fitness: "Health & Fitness",
            itineraries: "Itineraries",
            overview: "Overview",
            read_less: "Read less",
            read_more: "Read more",
            useful_to_know: "Useful to Know",
            view: {
              accommodation: "View Staterooms",
              dining: "View Dining",
              enrichment: "View Enrichment",
              entertainment: "View Entertainment",
              health_fitness: "View Health & Fitness",
              itineraries: "Itineraries",
              younger_travellers: "View Younger Travellers Facilities"
            },
            younger_travellers: "Younger Travellers"
          },
          tabs: {
            find_a_holiday: "Find a Holiday",
            find_a_ship: "Find a Ship"
          }
        },
        date: {
          abbr_day_names: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
          abbr_month_names: [null, "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          day_names: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          formats: {
            "default": "%d-%m-%Y",
            "long": "%d %B %Y",
            "short": "%d %b"
          },
          month_names: [null, "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
          order: ["year", "month", "day"]
        },
        dates: {
          date_to_before_date_from: "date_to cannot be before date_from",
          dates_in_the_past: "Dates cannot be in the past",
          invalid_date_format: "Date is not in the format YYYY-MM-DD",
          no_dates_found: "No holiday dates found with matching criteria",
          not_found_holidays: "No holidays found with matching criterias"
        },
        dates_travelling: {
          dates_travelling: "Dates Travelling",
          greyed_out_dates_indicate_no_cruise_available: "*Greyed out dates indicate no cruise available",
          see_months_tab: "(see MONTHS tab)"
        },
        datetime: {
          distance_in_words: {
            about_x_hours: {
              one: "about 1 hour",
              other: "about %{count} hours"
            },
            about_x_months: {
              one: "about 1 month",
              other: "about %{count} months"
            },
            about_x_years: {
              one: "about 1 year",
              other: "about %{count} years"
            },
            almost_x_years: {
              one: "almost 1 year",
              other: "almost %{count} years"
            },
            half_a_minute: "half a minute",
            less_than_x_minutes: {
              one: "less than a minute",
              other: "less than %{count} minutes"
            },
            less_than_x_seconds: {
              one: "less than 1 second",
              other: "less than %{count} seconds"
            },
            over_x_years: {
              one: "over 1 year",
              other: "over %{count} years"
            },
            x_days: {
              one: "1 day",
              other: "%{count} days"
            },
            x_minutes: {
              one: "1 minute",
              other: "%{count} minutes"
            },
            x_months: {
              one: "1 month",
              other: "%{count} months"
            },
            x_seconds: {
              one: "1 second",
              other: "%{count} seconds"
            }
          },
          prompts: {
            day: "Day",
            hour: "Hour",
            minute: "Minute",
            month: "Month",
            second: "Seconds",
            year: "Year"
          }
        },
        days: {
          friday: "Friday",
          monday: "Monday",
          saturday: "Saturday",
          sunday: "Sunday",
          thursady: "Thursday",
          tuesday: "Tuesday",
          wednesday: "Wednesday"
        },
        deckplans: "Deckplans",
        depart: "Depart",
        departure_port: {
          departure_port: "Departure Port",
          select_port: "Select Port"
        },
        departure_time: "Departure Time",
        description: "Description",
        destination: {
          destination: "Destination",
          see_regions_tab: "(see REGIONS tab)",
          select_destinations: "Select Destinations"
        },
        destroy: "Delete",
        destroy_language: "Remove language",
        destroy_model: "Delete %{name}",
        destroy_success: "%{name} was successfully deleted",
        devise: {
          confirmations: {
            confirmed: "Your email address has been successfully confirmed.",
            send_instructions: "You will receive an email with instructions for how to confirm your email address in a few minutes.",
            send_paranoid_instructions: "If your email address exists in our database, you will receive an email with instructions for how to confirm your email address in a few minutes."
          },
          custom_confirmations: {
            confirmed: "Your email address has been successfully confirmed.",
            send_instructions: "You will receive an email with instructions for how to confirm your email address in a few minutes.",
            send_paranoid_instructions: "If your email address exists in our database, you will receive an email with instructions for how to confirm your email address in a few minutes."
          },
          custom_passwords: {
            no_token: "You can't access this page without coming from a password reset email. If you do come from a password reset email, please make sure you used the full URL provided.",
            send_instructions: "You will receive an email with instructions on how to reset your password in a few minutes.",
            send_paranoid_instructions: "If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.",
            updated: "Your password has been changed successfully. You are now signed in.",
            updated_not_active: "Your password has been changed successfully."
          },
          custom_registrations: {
            delete_modal: {
              are_you_sure: "Are you sure you want to delete your account?",
              "delete": "Delete my Account",
              modal_title: "Warning: Account deletion",
              warning: "Doing so means you will no longer be able to edit or add content to your pages. If you are unsure about what to do or what this means, please contact your Account Manager."
            },
            destroyed: "Bye! Your account has been successfully cancelled. We hope to see you again soon.",
            edit: {
              cookie: "Cookie Policy",
              "delete": "Delete my account",
              "export": "Download my user information",
              privacy_policy: "Privacy Policy",
              terms_and_conditions: "Terms & Conditions",
              update: "Update Information"
            },
            signed_up: "Welcome! You have signed up successfully.",
            signed_up_but_inactive: "You have signed up successfully. However, we could not sign you in because your account is not yet activated.",
            signed_up_but_locked: "You have signed up successfully. However, we could not sign you in because your account is locked.",
            signed_up_but_unconfirmed: "A message with a confirmation link has been sent to your email address. Please follow the link to activate your account.",
            update_needs_confirmation: "Your account has been updated successfully, but we need to verify your new email address. Please check your email and follow the confirm link to confirm your new email address.",
            updated: "Your account has been updated successfully.",
            validation_errors: "The following errors occurred during registration: \n %{errors}"
          },
          custom_sessions: {
            already_signed_out: "Signed out successfully.",
            signed_in: "Signed in successfully.",
            signed_out: "Signed out successfully."
          },
          custom_unlocks: {
            send_instructions: "You will receive an email with instructions for how to unlock your account in a few minutes.",
            send_paranoid_instructions: "If your account exists, you will receive an email with instructions for how to unlock it in a few minutes.",
            unlocked: "Your account has been unlocked successfully. Please sign in to continue."
          },
          edit_account: "Edit account",
          email_label: "Email",
          failure: {
            already_authenticated: "You are already signed in.",
            inactive: "Your account is not activated yet.",
            invalid: "Invalid login or password.",
            invited: "You have a pending invitation, accept it to finish creating your account.",
            last_attempt: "You have one more attempt before your account is locked.",
            locked: "Your account is locked.",
            not_found_in_database: "Invalid email address or password.",
            timeout: "Your session expired. Please sign in again to continue.",
            unauthenticated: "You need to sign in or sign up before continuing.",
            unconfirmed: "You have to confirm your email address before continuing."
          },
          forgot_your_password: "Forgot your password?",
          invitations: {
            edit: {
              header: "Set your password",
              submit_button: "Set my password"
            },
            invitation_removed: "Your invitation was removed.",
            invitation_token_invalid: "The invitation token provided is not valid!",
            "new": {
              header: "Send invitation",
              submit_button: "Send an invitation"
            },
            no_invitations_remaining: "No invitations remaining",
            send_instructions: "An invitation email has been sent to %{email}.",
            updated: "Your password was set successfully. You are now signed in.",
            updated_not_active: "Your password was set successfully."
          },
          invite_user: "Invite user",
          link_expired: {
            instructions: "Please enter your email address below to receive a new one.",
            title: "This password reset link has expired."
          },
          mailer: {
            confirmation_instructions: {
              subject: "Confirmation instructions"
            },
            invitation_instructions: {
              accept: "Accept invitation",
              accept_until: "This invitation will be due in %{due_date}.",
              hello: "Hello %{email}!",
              ignore: "If you don't want to accept the invitation, please ignore this email.<br />Your account won't be created until you access the link above and set your password.",
              someone_invited_you: "Someone has invited you to join Widgety, you can accept it through the link below.",
              subject: "Invitation instructions"
            },
            reset_password_instructions: {
              subject: "Reset password instructions"
            },
            unlock_instructions: {
              subject: "Unlock instructions"
            }
          },
          omniauth_callbacks: {
            failure: 'Could not authenticate you from %{kind} because "%{reason}".',
            success: "Successfully authenticated from %{kind} account."
          },
          password_label: "Password",
          password_validation_block: {
            password_length: "Be at least 8 characters long",
            password_lowercase: "Have at least one lowercase",
            password_number_case: "Have at least one number",
            password_special_character: "Have at least one special character",
            password_uppercase: "Have at least one uppercase",
            special_characters: "(!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~)",
            title: "Password must:"
          },
          passwords: {
            no_token: "You can't access this page without coming from a password reset email. If you do come from a password reset email, please make sure you used the full URL provided.",
            send_instructions: "You will receive an email with instructions on how to reset your password in a few minutes.",
            send_paranoid_instructions: "If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.",
            updated: "Your password has been changed successfully. You are now signed in.",
            updated_not_active: "Your password has been changed successfully."
          },
          policy_not_accepted: "You must accept privacy policy.",
          registrations: {
            destroyed: "Bye! Your account has been successfully cancelled. We hope to see you again soon.",
            signed_up: "Welcome! You have signed up successfully.",
            signed_up_but_inactive: "You have signed up successfully. However, we could not sign you in because your account is not yet activated.",
            signed_up_but_locked: "You have signed up successfully. However, we could not sign you in because your account is locked.",
            signed_up_but_unconfirmed: "A message with a confirmation link has been sent to your email address. Please follow the link to activate your account.",
            update_needs_confirmation: "Your account has been updated successfully, but we need to verify your new email address. Please check your email and follow the confirm link to confirm your new email address.",
            updated: "Your account has been updated successfully.",
            validation_errors: "The following errors occurred during registration: \n %{errors}"
          },
          remember_label: "Remember Me",
          reset_password: {
            title_after_sending: "Check Your Email",
            title_of_reset_password: "Set New Password",
            title_of_the_link_expired: "Link expired",
            title_of_the_unreceived_email: "No Email Received?"
          },
          reset_password_label: "Reset Password",
          sessions: {
            already_signed_out: "Signed out successfully.",
            signed_in: "Signed in successfully.",
            signed_out: "Signed out successfully."
          },
          sign_in: "Log In",
          sign_in_button: "Next",
          sign_in_placeholder: "Your username or email address",
          sign_out: "Sign out",
          sign_up: "Sign Up",
          success_registration: {
            button_name: "Back to Log in",
            description: "Your account has been successfully created.",
            title: "Account Created"
          },
          success_reset_password: {
            description: "Your password has been successfully reset.",
            title: "Password reset"
          },
          unlocks: {
            send_instructions: "You will receive an email with instructions for how to unlock your account in a few minutes.",
            send_paranoid_instructions: "If your account exists, you will receive an email with instructions for how to unlock it in a few minutes.",
            unlocked: "Your account has been unlocked successfully. Please sign in to continue."
          },
          unreceived_email_rules: {
            expectation: "Wait up to 10 min. Sometimes it might be a bit late.",
            issues: "If you still have issues, please contact our <a class='unreceived-email__support-message' href='mailto:support@widgety.co.uk'>support team</a>.",
            resend: "Re-send with button below.",
            spam_checker: "Check your Promotions and Spam folders. Sometimes it might end up there. Make sure you move it into your main folder.",
            title: "Follow the guidelines below:"
          },
          username_label: "Username"
        },
        dining: {
          experience: "Experience",
          food: "Food"
        },
        dining_experience_options: {
          complimentary: "Complimentary",
          cover: "Cover charge may apply",
          snacks: "Snacks/ light bites"
        },
        dining_food_type_options: {
          american: "American",
          asian: "Asian",
          bakery: "Bakery",
          bbq: "BBQ & Grill",
          british: "British",
          brunch: "Brunch",
          buffet: "Buffet",
          cafe: "Cafe",
          caribbean: "Caribbean",
          casual: "Casual",
          chef: "Chef's Table",
          classic: "Classic",
          continental: "Continental",
          fast: "Fast Food",
          fine: "Fine Dining",
          french: "French",
          fusion: "Fusion",
          gastro: "Gastro Pub",
          gelato: "Gelato",
          gourmet: "Gourmet",
          healthy: "Healthy Option",
          ice_cream: "Ice Cream Parlour",
          indian: "Indian",
          international: "International",
          italian: "Italian",
          japanese: "Japanese",
          mexican: "Mexican",
          new_orleans: "New Orleans",
          pacific: "Pacific Rim",
          pizzeria: "Pizzeria",
          regional: "Regionally Inspired",
          room: "Room Service",
          seafood: "Seafood",
          south_american: "South American",
          spanish: "Spanish",
          steakhouse: "Steakhouse",
          surf_turf: "Steak & Seafood",
          sushi: "Sushi",
          tapas: "Tapas",
          themed: "Themed",
          varies: "Varies",
          wine_dine: "Wine & Dine"
        },
        duplicate: "Duplicate",
        duplicate_model: "Duplicate %{name}",
        duplicate_success: "%{name} was successfully duplicated",
        edit: "Edit",
        edit_model: "Edit %{name}",
        edit_widget: "Edit embedded widget for this %{name}",
        end_at_date: "*End Date",
        end_at_time: "*End Time",
        end_at_without_zone: "*End at",
        enquire: "Enquire",
        enquiry: {
          enquiry: "Enquiry",
          placeholders: {
            cabin_type: "Select Cabin Type",
            call_time: "Select Call Time",
            email: "E-mail",
            first_name: "First Name",
            last_name: "Last Name",
            message: "Message",
            number_of_passengers: "Number of passengers",
            phone: "Phone",
            post_code: "Post code",
            title: "Select Title"
          }
        },
        enrichment: "Enrichment",
        enumerize: {
          teams_team: {
            interests: {
              cruise_and_travel: "Cruise & Travel",
              visitor_attractions_and_tourism: "Visitor Attractions & Tourism"
            }
          },
          user: {
            interests: {
              cruise_and_travel: "Cruise & Travel",
              visitor_attractions_and_tourism: "Visitor Attractions & Tourism"
            }
          }
        },
        enums: {
          fare: {
            availability: {
              available: "Available",
              closed: "Closed",
              guarantee: "Guarantee",
              wait_list: "Waitlist"
            }
          },
          permissions: {
            booking_permission: {
              currency: {
                AUD: "AUD",
                CAD: "CAD",
                EUR: "EUR",
                GBP: "GBP",
                NZD: "NZD",
                USD: "USD"
              }
            }
          },
          regions: {
            cabin_type: {
              balcony: "Balcony",
              family_of_4: "Family of 4",
              inside: "Inside",
              no_cabin_type_preference: "No Preference",
              outside: "Outside",
              single: "Single",
              suite: "Suite"
            },
            call_time: {
              afternoon: "Afternoon",
              asap: "ASAP",
              evening: "Evening",
              morning: "Morning",
              no_call_time_preference: "No Preference"
            },
            level: {
              area: "City/Town/National Park",
              area1: "First level area",
              continent: "Continent",
              country: "Country",
              county: "County",
              district: "District",
              nested_area: "Area",
              place1: "Place 1",
              place2: "Place 2",
              state: "State"
            }
          },
          widgets: {
            cruise_tour_searches: {
              enquiry: {
                cabin_type: {
                  balcony: "Balcony",
                  family_of_4: "Family of 4",
                  inside: "Inside",
                  no_cabin_type_preference: "No cabin type preference",
                  outside: "Oceanview",
                  single: "Single",
                  suite: "Suite"
                },
                call_time: {
                  afternoon: "Afternoon",
                  asap: "Asap",
                  evening: "Evening",
                  morning: "Morning",
                  no_call_time_preference: "No cabin type preference"
                },
                title: {
                  miss: "Miss",
                  mr: "Mr",
                  mrs: "Mrs",
                  ms: "Ms"
                }
              }
            },
            meet_the_fleets: {
              enquiry: {
                cabin_type: {
                  balcony: "Balcony",
                  family_of_4: "Family of 4",
                  inside: "Inside",
                  no_cabin_type_preference: "No cabin type preference",
                  outside: "Outside",
                  single: "Single",
                  suite: "Suite"
                },
                call_time: {
                  afternoon: "Afternoon",
                  asap: "Asap",
                  evening: "Evening",
                  morning: "Morning",
                  no_call_time_preference: "No call time preference"
                },
                title: {
                  miss: "Miss",
                  mr: "Mr",
                  mrs: "Mrs",
                  ms: "Ms"
                }
              }
            },
            widget: {
              design: {
                "default": "Default",
                grid: "Grid",
                list: "List",
                old: "Old"
              }
            }
          }
        },
        errors: {
          format: "%{attribute} %{message}",
          messages: {
            accepted: "must be accepted",
            after: "must be after %{restriction}",
            already_confirmed: "was already confirmed, please try signing in",
            before: "must be before %{restriction}",
            blank: "can't be blank",
            character_validation: "Must include at least one special character",
            confirmation: "doesn't match %{attribute}",
            confirmation_period_expired: "needs to be confirmed within %{period}, please request a new one",
            email_invalid: "Invalid email.",
            empty: "can't be empty",
            equal_to: "must be equal to %{count}",
            even: "must be even",
            exclusion: "is reserved",
            expired: "has expired, please request a new one",
            greater_than: "must be greater than %{count}",
            greater_than_or_equal_to: "must be greater than or equal to %{count}",
            inclusion: "is not included in the list",
            invalid: "is invalid",
            invalid_date: "is not a valid date",
            invalid_datetime: "is not a valid datetime",
            invalid_time: "is not a valid time",
            is_at: "must be at %{restriction}",
            less_than: "must be less than %{count}",
            less_than_or_equal_to: "must be less than or equal to %{count}",
            lower_validation: "Must include at least one lowercase letter",
            model_invalid: "%{errors}",
            new_password_valid: "Your new password cannot be the same as your current password.",
            not_a_number: "is not a number",
            not_an_integer: "must be an integer",
            not_equal: "Password does not match!",
            not_found: "Email not found.",
            not_locked: "was not locked",
            not_saved: {
              one: "1 error prohibited this %{resource} from being saved:",
              other: "%{count} errors prohibited this %{resource} from being saved:"
            },
            number_validation: "Must include at least one number",
            odd: "must be odd",
            on_or_after: "must be on or after %{restriction}",
            on_or_before: "must be on or before %{restriction}",
            other_than: "must be other than %{count}",
            present: "must be blank",
            taken: "has already been taken",
            too_long: "is too long (maximum is %{count} characters)",
            too_short: "is too short (minimum is %{count} characters)",
            upper_validations: "Must include at least one uppercase letter",
            wrong_length: "is the wrong length (should be %{count} characters)"
          }
        },
        exterior: "Exterior",
        family_cruises: "Family Cruises",
        find_a_cruise: "Find A Cruise",
        find_a_ship: "Find A Ship",
        fly_cruise: "Fly Cruise",
        follow: "Follow",
        free: "FREE",
        from: "From",
        full_name: "Full name",
        galleries: {
          form: {
            create_gallery: "CREATE GALLERY",
            update: "Update Details"
          },
          galleries: {
            Attachment: "File",
            Image: "Image"
          }
        },
        general: {
          errors: {
            record_not_found: "Record not found"
          }
        },
        global_search: {
          blank_message: "No results found.",
          search_panel: {
            all: "All",
            events: "Events",
            operators: "Operators",
            places: "Places",
            promotions: "Promotions",
            ships: "Ships"
          },
          title: "Search"
        },
        hellip_html: "&hellip;",
        helpers: {
          page_entries_info: {
            entry: {
              one: "entry",
              other: "entries",
              zero: "entries"
            },
            more_pages: {
              display_entries: "Displaying %{entry_name} <b>%{first}&nbsp;-&nbsp;%{last}</b> of <b>%{total}</b> in total"
            },
            one_page: {
              display_entries: {
                one: "Displaying <b>1</b> %{entry_name}",
                other: "Displaying <b>all %{count}</b> %{entry_name}",
                zero: "No %{entry_name} found"
              }
            }
          },
          select: {
            prompt: "Please select"
          },
          submit: {
            create: "Create %{model}",
            submit: "Save %{model}",
            update: "Update %{model}"
          }
        },
        holidays: {
          errors: {
            conflicting_holiday_type_filters: "You cannot use the holiday_types and exact_holiday_types filters at the same time."
          }
        },
        home: "Home",
        ignore: "Ignore",
        info: "Info",
        interests: {
          cruise_and_travel: "Cruise & Travel",
          visitor_attractions_and_tourism: "Visitor Attractions & Tourism"
        },
        interior: "Interior",
        international_departures: "International Departures",
        itineraries: "Itineraries",
        itinerary: "Itinerary",
        kids: "Kids",
        kids_teens: "Kids & Teens",
        language_name: {
          en: "English",
          es: "Spanish",
          fr: "France"
        },
        latitude: "*Latitude",
        layouts: {
          cookie_policy_bar: {
            learn_more: "Learn more",
            notification: "This website uses cookies to ensure you get the best experience on our website."
          },
          policy_modal: {
            gdpr_intro: "To comply the GDPR (General Data Protection Regulation) taking effect on 25th of May, we have to update our Privacy Policy and have made some changes to your User Account. These changes aim to make you fully aware of where your data is stored, and what we use it for, as well as giving you easy access to all the settings allowing you to delete, and amend that information.",
            ok: "Sounds good, Let's have a look",
            title: "Update to our Privacy Settings"
          }
        },
        length_of_cruise: {
          length_of_cruise: "Length of Cruise",
          nights: "nights"
        },
        link_error: "Link Error",
        loading: "Loading...",
        longitude: "*Longitude",
        make_an_enquiry: "Make an Enquiry",
        map: "Map",
        map_itinerary: "Map & Itinerary",
        meet_the_fleet: {
          cabins: {
            balcony: "Balcony",
            inside: "Interior",
            outside: "Exterior",
            suite: "Suite"
          },
          enquiry: {
            placeholders: {
              cabin_type: "Select Cabin Type",
              call_time: "Select Call Time",
              email: "E-mail",
              first_name: "First Name",
              last_name: "Last Name",
              message: "Message",
              number_of_passengers: "Number of passengers",
              phone: "Phone",
              post_code: "Post code",
              title: "Select Title"
            }
          }
        },
        min_search_characters: "Please use at least %{min} characters in your search term",
        more_info: "More Info",
        more_information: "More Information",
        name: "Name",
        nights: "Nights",
        number: {
          currency: {
            format: {
              delimiter: ",",
              format: "%u%n",
              precision: 2,
              separator: ".",
              significant: !1,
              strip_insignificant_zeros: !1,
              unit: "\xa3"
            }
          },
          format: {
            delimiter: ",",
            precision: 3,
            separator: ".",
            significant: !1,
            strip_insignificant_zeros: !1
          },
          human: {
            decimal_units: {
              format: "%n %u",
              units: {
                billion: "Billion",
                million: "Million",
                quadrillion: "Quadrillion",
                thousand: "Thousand",
                trillion: "Trillion",
                unit: ""
              }
            },
            format: {
              delimiter: "",
              precision: 3,
              significant: !0,
              strip_insignificant_zeros: !0
            },
            storage_units: {
              format: "%n %u",
              units: {
                "byte": {
                  one: "Byte",
                  other: "Bytes"
                },
                gb: "GB",
                kb: "KB",
                mb: "MB",
                tb: "TB"
              }
            }
          },
          percentage: {
            format: {
              delimiter: "",
              format: "%n%"
            }
          },
          precision: {
            format: {
              delimiter: ""
            }
          }
        },
        nursery: "Nursery",
        ocean: "Ocean",
        ok: "OK",
        old_page_categories: {
          "Arts & Entertainment": {
            arts_entertainment_aquarium: "Aquarium",
            arts_entertainment_arcade: "Arcade",
            arts_entertainment_art_gallery: "Art Gallery",
            arts_entertainment_billiards: "Pool Hall",
            arts_entertainment_bowling_alley: "Bowling Alley",
            arts_entertainment_casino: "Casino",
            arts_entertainment_circus: "Circus",
            arts_entertainment_comedy_club: "Comedy Club",
            arts_entertainment_concert_hall: "Concert Hall",
            arts_entertainment_country_dance_club: "Country Dance Club",
            arts_entertainment_disc_golf: "Disc Golf",
            arts_entertainment_entertainment: "General Entertainment",
            arts_entertainment_go_kart: "Go Kart Track",
            arts_entertainment_historic_site: "Historic Site",
            arts_entertainment_laser_tag: "Laser Tag",
            arts_entertainment_mini_golf: "Mini Golf",
            arts_entertainment_movie_theater: "Movie Theater",
            arts_entertainment_museum: "Museum",
            arts_entertainment_music_venue: "Music Venue",
            arts_entertainment_outdoor_sculpture: "Outdoor Sculpture",
            arts_entertainment_performing_arts: "Performing Arts Venue",
            arts_entertainment_public_art: "Public Art",
            arts_entertainment_racetrack: "Racetrack",
            arts_entertainment_roller_rink: "Roller Rink",
            arts_entertainment_salsa_club: "Salsa Club",
            arts_entertainment_stadium: "Stadium",
            arts_entertainment_street_art: "Street Art",
            arts_entertainment_theme_park: "Theme Park",
            arts_entertainment_water_park: "Water Park",
            arts_entertainment_zoo: "Zoo"
          },
          "College & University": {
            college_university_academic_building: "College Academic Building",
            college_university_administrative_building: "College Administrative Building",
            college_university_auditorium: "College Auditorium",
            college_university_bookstore: "College Bookstore",
            college_university_cafeteria: "College Cafeteria",
            college_university_classroom: "College Classroom",
            college_university_community_college: "Community College",
            college_university_education: "General College & University",
            college_university_frat_house: "Fraternity House",
            college_university_gym: "College Gym",
            college_university_lab: "College Lab",
            college_university_law_school: "Law School",
            college_university_library: "College Library",
            college_university_medical_school: "Medical School",
            college_university_quad: "College Quad",
            college_university_rec_center: "College Rec Center",
            college_university_residence_hall: "College Residence Hall",
            college_university_sorority_house: "Sorority House",
            college_university_stadium: "College Stadium",
            college_university_student_center: "Student Center",
            college_university_theater: "College Theater",
            college_university_trade_school: "Trade School",
            college_university_university: "University"
          },
          Event: {
            event_conference: "Conference",
            event_convention: "Convention",
            event_fair: "Street Fair",
            event_festival: "Festival",
            event_music_festival: "Music Festival",
            event_other_event: "Other Event",
            event_parade: "Parade",
            event_stoop_sale: "Stoop Sale"
          },
          Food: {
            food_afghan: "Afghan Restaurant",
            food_african: "African Restaurant",
            food_american: "American Restaurant",
            food_arepas: "Arepa Restaurant",
            food_argentinian: "Argentinian Restaurant",
            food_asian: "Asian Restaurant",
            food_australian: "Australian Restaurant",
            food_austrian: "Austrian Restaurant",
            food_bagels: "Bagel Shop",
            food_bakery: "Bakery",
            food_bbq: "BBQ Joint",
            food_belarusian: "Belarusian Restaurant",
            food_belgian: "Belgian Restaurant",
            food_bistro: "Bistro",
            food_brazilian: "Brazilian Restaurant",
            food_breakfast: "Breakfast Spot",
            food_bubble_tea: "Bubble Tea Shop",
            food_buffet: "Buffet",
            food_burgers: "Burger Joint",
            food_burritos: "Burrito Place",
            food_cafe: "Caf\xe9",
            food_cafeteria: "Cafeteria",
            food_cajun_creole: "Cajun / Creole Restaurant",
            food_cambodian: "Cambodian Restaurant",
            food_caribbean: "Caribbean Restaurant",
            food_caucasian: "Caucasian Restaurant",
            food_chinese: "Chinese Restaurant",
            food_coffee_shop: "Coffee Shop",
            food_comfort_food: "Comfort Food Restaurant",
            food_creperie: "Creperie",
            food_cuban: "Cuban Restaurant",
            food_cupcakes: "Cupcake Shop",
            food_czech: "Czech Restaurant",
            food_deli_bodega: "Deli / Bodega",
            food_desserts: "Dessert Shop",
            food_dim_sum: "Dim Sum Restaurant",
            food_diner: "Diner",
            food_distillery: "Distillery",
            food_donuts: "Donut Shop",
            food_dumplings: "Dumpling Restaurant",
            food_eastern_european: "Eastern European Restaurant",
            food_english: "English Restaurant",
            food_ethiopian: "Ethiopian Restaurant",
            food_falafel: "Falafel Restaurant",
            food_fast_food: "Fast Food Restaurant",
            food_filipino: "Filipino Restaurant",
            food_fish_chips: "Fish & Chips Shop",
            food_fondue: "Fondue Restaurant",
            food_food_truck: "Food Truck",
            food_french: "French Restaurant",
            food_fried_chicken: "Fried Chicken Joint",
            food_frozen_yogurt: "Frozen Yogurt",
            food_gastropub: "Gastropub",
            food_german: "German Restaurant",
            "food_gluten-free": "Gluten-free Restaurant",
            food_greek: "Greek Restaurant",
            food_halal: "Halal Restaurant",
            food_hawaiian: "Hawaiian Restaurant",
            food_himalayan: "Himalayan Restaurant",
            food_hot_dogs: "Hot Dog Joint",
            food_hotpot: "Hotpot Restaurant",
            food_hungarian: "Hungarian Restaurant",
            food_ice_cream: "Ice Cream Shop",
            food_indian: "Indian Restaurant",
            food_indonesian: "Indonesian Restaurant",
            food_irish: "Irish Pub",
            food_italian: "Italian Restaurant",
            food_japanese: "Japanese Restaurant",
            food_jewish: "Jewish Restaurant",
            food_juice_bar: "Juice Bar",
            food_korean: "Korean Restaurant",
            food_kosher: "Kosher Restaurant",
            food_latin_american: "Latin American Restaurant",
            food_mac_cheese: "Mac & Cheese Joint",
            food_malaysian: "Malaysian Restaurant",
            food_mediterranean: "Mediterranean Restaurant",
            food_mexican: "Mexican Restaurant",
            food_middle_eastern: "Middle Eastern Restaurant",
            food_modern_european: "Modern European Restaurant",
            food_molecular_gastronomy: "Molecular Gastronomy Restaurant",
            food_mongolian: "Mongolian Restaurant",
            food_moroccan: "Moroccan Restaurant",
            food_new_american: "New American Restaurant",
            food_pakistani: "Pakistani Restaurant",
            food_persian: "Persian Restaurant",
            food_peruvian: "Peruvian Restaurant",
            food_pie_shop: "Pie Shop",
            food_pizza: "Pizza Place",
            food_polish: "Polish Restaurant",
            food_portuguese: "Portuguese Restaurant",
            food_ramen_noodles: "Ramen / Noodle House",
            food_restaurant: "Restaurant",
            food_romanian: "Romanian Restaurant",
            food_russian: "Russian Restaurant",
            food_salad: "Salad Place",
            food_sandwiches: "Sandwich Place",
            food_scandinavian: "Scandinavian Restaurant",
            food_seafood: "Seafood Restaurant",
            food_snacks: "Snack Place",
            food_soup: "Soup Place",
            food_south_american: "South American Restaurant",
            food_southern_soul: "Southern / Soul Food Restaurant",
            food_souvlaki: "Souvlaki Shop",
            food_spanish: "Spanish Restaurant",
            food_steakhouse: "Steakhouse",
            food_sushi: "Sushi Restaurant",
            food_swiss: "Swiss Restaurant",
            food_tacos: "Taco Place",
            food_tapas: "Tapas Restaurant",
            food_tatar: "Tatar Restaurant",
            food_tea_room: "Tea Room",
            food_thai: "Thai Restaurant",
            food_tibetan: "Tibetan Restaurant",
            food_turkish: "Turkish Restaurant",
            food_ukrainian: "Ukrainian Restaurant",
            food_vegetarian_vegan: "Vegetarian / Vegan Restaurant",
            food_vietnamese: "Vietnamese Restaurant",
            food_winery: "Winery",
            food_wings: "Wings Joint"
          },
          "Nightlife Spot": {
            nightlife_spot_bar: "Bar",
            nightlife_spot_beach_bar: "Beach Bar",
            nightlife_spot_beer_garden: "Beer Garden",
            nightlife_spot_brewery: "Brewery",
            nightlife_spot_champagne_bar: "Champagne Bar",
            nightlife_spot_cocktail: "Cocktail Bar",
            nightlife_spot_dive_bar: "Dive Bar",
            nightlife_spot_gay_bar: "Gay Bar",
            nightlife_spot_hookah_bar: "Hookah Bar",
            nightlife_spot_hotel_bar: "Hotel Bar",
            nightlife_spot_karaoke: "Karaoke Bar",
            nightlife_spot_lounge: "Lounge",
            nightlife_spot_nightclub: "Nightclub",
            nightlife_spot_nightlife: "Other Nightlife",
            nightlife_spot_pub: "Pub",
            nightlife_spot_sake_bar: "Sake Bar",
            nightlife_spot_speakeasy: "Speakeasy",
            nightlife_spot_sports_bar: "Sports Bar",
            nightlife_spot_strip_club: "Strip Club",
            nightlife_spot_whisky_bar: "Whisky Bar",
            nightlife_spot_wine_bar: "Wine Bar"
          },
          "Outdoors & Recreation": {
            outdoors_recreation_athletics_sports: "Athletics & Sports",
            outdoors_recreation_bath_house: "Bath House",
            outdoors_recreation_bathing_area: "Bathing Area",
            outdoors_recreation_beach: "Beach",
            outdoors_recreation_botanical_garden: "Botanical Garden",
            outdoors_recreation_bridge: "Bridge",
            outdoors_recreation_campground: "Campground",
            outdoors_recreation_castle: "Castle",
            outdoors_recreation_cemetery: "Cemetery",
            outdoors_recreation_dive_spot: "Dive Spot",
            outdoors_recreation_dog_run: "Dog Run",
            outdoors_recreation_farm: "Farm",
            outdoors_recreation_field: "Field",
            outdoors_recreation_fishing_spot: "Fishing Spot",
            outdoors_recreation_forest: "Forest",
            outdoors_recreation_garden: "Garden",
            outdoors_recreation_gun_range: "Gun Range",
            outdoors_recreation_harbor_marina: "Harbor / Marina",
            outdoors_recreation_hot_spring: "Hot Spring",
            outdoors_recreation_island: "Island",
            outdoors_recreation_lake: "Lake",
            outdoors_recreation_lighthouse: "Lighthouse",
            outdoors_recreation_mountain: "Mountain",
            outdoors_recreation_national_park: "National Park",
            outdoors_recreation_other_outdoors: "Other Great Outdoors",
            outdoors_recreation_palace: "Palace",
            outdoors_recreation_park: "Park",
            outdoors_recreation_pedestrian_street_plaza: "Pedestrian Plaza",
            outdoors_recreation_playground: "Playground",
            outdoors_recreation_plaza: "Plaza",
            outdoors_recreation_pool: "Pool",
            outdoors_recreation_preserve: "Nature Preserve",
            outdoors_recreation_rafting: "Rafting",
            outdoors_recreation_recreation_center: "Recreation Center",
            outdoors_recreation_river: "River",
            outdoors_recreation_rock_climbing: "Rock Climbing Spot",
            outdoors_recreation_scenic_lookout: "Scenic Lookout",
            outdoors_recreation_sculpture: "Sculpture Garden",
            outdoors_recreation_ski_area: "Ski Area",
            outdoors_recreation_stables: "Stables",
            outdoors_recreation_states_municipalities: "States & Municipalities",
            outdoors_recreation_summer_camp: "Summer Camp",
            outdoors_recreation_trail: "Trail",
            outdoors_recreation_tree: "Tree",
            outdoors_recreation_vineyard: "Vineyard",
            outdoors_recreation_volcano: "Volcano",
            outdoors_recreation_well: "Well"
          },
          "Professional & Other Places": {
            professional_other_places_animal_shelter: "Animal Shelter",
            professional_other_places_auditorium: "Auditorium",
            professional_other_places_building: "Building",
            professional_other_places_club: "Club House",
            professional_other_places_community_center: "Community Center",
            professional_other_places_convention_center: "Convention Center",
            professional_other_places_cultural_center: "Cultural Center",
            professional_other_places_distributor: "Distribution Center",
            professional_other_places_event_space: "Event Space",
            professional_other_places_factory: "Factory",
            professional_other_places_fair: "Fair",
            professional_other_places_funeral_home: "Funeral Home",
            professional_other_places_government: "Government Building",
            professional_other_places_library: "Library",
            professional_other_places_medical: "Medical Center",
            professional_other_places_military_base: "Military Base",
            "professional_other_places_non-profit": "Non-Profit",
            professional_other_places_office: "Office",
            professional_other_places_parking: "Parking",
            professional_other_places_post_office: "Post Office",
            professional_other_places_prison: "Prison",
            professional_other_places_radio_station: "Radio Station",
            professional_other_places_recruiting_agency: "Recruiting Agency",
            professional_other_places_school: "School",
            professional_other_places_social_club: "Social Club",
            professional_other_places_spiritual: "Spiritual Center",
            professional_other_places_tv_station: "TV Station",
            professional_other_places_voting_booth: "Voting Booth",
            professional_other_places_warehouse: "Warehouse"
          },
          Residence: {
            residence_assisted_living: "Assisted Living",
            residence_home: "Home (private)",
            residence_housing_development: "Housing Development",
            residence_residential: "Residential Building (Apartment / Condo)",
            residence_trailer_park: "Trailer Park"
          },
          "Shop & Service": {
            shop_service_adult_boutique: "Adult Boutique",
            shop_service_antiques: "Antique Shop",
            shop_service_apparel: "Clothing Store",
            shop_service_arts_crafts: "Arts & Crafts Store",
            shop_service_astrologer: "Astrologer",
            shop_service_atm: "ATM",
            shop_service_auto_garage: "Auto Garage",
            shop_service_automotive: "Automotive Shop",
            shop_service_baby_store: "Baby Store",
            shop_service_bank: "Bank",
            shop_service_betting_shop: "Betting Shop",
            shop_service_big_box_store: "Big Box Store",
            shop_service_bike_shop: "Bike Shop",
            shop_service_board_shop: "Board Shop",
            shop_service_bookstore: "Bookstore",
            shop_service_bridal: "Bridal Shop",
            shop_service_camera_store: "Camera Store",
            shop_service_candy_store: "Candy Store",
            shop_service_car_dealer: "Car Dealership",
            shop_service_car_wash: "Car Wash",
            shop_service_carpet_store: "Carpet Store",
            shop_service_check_cashing_service: "Check Cashing Service",
            shop_service_chocolate_shop: "Chocolate Shop",
            shop_service_christmas_market: "Christmas Market",
            shop_service_comic_shop: "Comic Shop",
            shop_service_convenience_stores: "Convenience Store",
            shop_service_cosmetics: "Cosmetics Shop",
            shop_service_costume_shop: "Costume Shop",
            shop_service_credit_union: "Credit Union",
            shop_service_daycare: "Daycare",
            shop_service_department_store: "Department Store",
            shop_service_design: "Design Studio",
            shop_service_discount_store: "Discount Store",
            shop_service_dispensary: "Marijuana Dispensary",
            shop_service_dive_shop: "Dive Shop",
            shop_service_dry_cleaner: "Dry Cleaner",
            shop_service_electronics: "Electronics Store",
            shop_service_ev_charging: "EV Charging Station",
            shop_service_fabric_shop: "Fabric Shop",
            shop_service_financial_legal: "Financial or Legal Service",
            shop_service_fireworks_store: "Fireworks Store",
            shop_service_fishing_store: "Fishing Store",
            shop_service_flea_market: "Flea Market",
            shop_service_flower_shop: "Flower Shop",
            shop_service_food_drink: "Food & Drink Shop",
            shop_service_frame_store: "Frame Store",
            shop_service_fruit_vegetable_store: "Fruit & Vegetable Store",
            shop_service_furniture_home: "Furniture / Home Store",
            shop_service_gaming_cafe: "Gaming Cafe",
            shop_service_garden_center: "Garden Center",
            shop_service_gas_station_garage: "Gas Station / Garage",
            shop_service_gift_shop: "Gift Shop",
            shop_service_gun_shop: "Gun Shop",
            shop_service_gym_fitness: "Gym / Fitness Center",
            shop_service_hardware: "Hardware Store",
            shop_service_herbs_spices_store: "Herbs & Spices Store",
            shop_service_hobbies: "Hobby Shop",
            shop_service_hunting_supply: "Hunting Supply",
            shop_service_internet_cafe: "Internet Cafe",
            shop_service_it_services: "IT Services",
            shop_service_jewelry: "Jewelry Store",
            shop_service_knitting_supplies: "Knitting Store",
            shop_service_laundromat: "Laundromat",
            shop_service_laundry: "Laundry Service",
            shop_service_lawyer: "Lawyer",
            shop_service_leather_goods: "Leather Goods Store",
            shop_service_locksmith: "Locksmith",
            shop_service_lottery: "Lottery Retailer",
            shop_service_luggage_store: "Luggage Store",
            shop_service_mall: "Mall",
            shop_service_market: "Market",
            shop_service_massage_studio: "Massage Studio",
            shop_service_mattress_store: "Mattress Store",
            shop_service_mobile_phone: "Mobile Phone Shop",
            shop_service_motorcycle_shop: "Motorcycle Shop",
            shop_service_music_store: "Music Store",
            shop_service_nail_salon: "Nail Salon",
            shop_service_newsstand: "Newsstand",
            shop_service_office_supplies: "Paper / Office Supplies Store",
            shop_service_optical: "Optical Shop",
            shop_service_other_repair: "Other Repair Shop",
            shop_service_outdoor_supplies: "Outdoor Supply Store",
            shop_service_outlet_store: "Outlet Store",
            shop_service_pawn_shop: "Pawn Shop",
            shop_service_perfume_shop: "Perfume Shop",
            shop_service_pet_service: "Pet Service",
            shop_service_pet_store: "Pet Store",
            shop_service_pharmacy: "Drugstore / Pharmacy",
            shop_service_photography_lab: "Photography Lab",
            shop_service_piercing_parlor: "Piercing Parlor",
            "shop_service_pop-up_shop": "Pop-Up Shop",
            shop_service_print_shop: "Print Shop",
            shop_service_real_estate: "Real Estate Office",
            shop_service_record_shop: "Record Shop",
            shop_service_recording_studio: "Recording Studio",
            shop_service_recycling: "Recycling Facility",
            shop_service_salon_barbershop: "Salon / Barbershop",
            shop_service_shipping_store: "Shipping Store",
            shop_service_shoe_repair: "Shoe Repair",
            shop_service_shop: "Miscellaneous Shop",
            shop_service_smoke_shop: "Smoke Shop",
            shop_service_smoothie_shop: "Smoothie Shop",
            shop_service_souvenir_shop: "Souvenir Shop",
            shop_service_spa: "Spa",
            shop_service_sporting_goods: "Sporting Goods Shop",
            shop_service_stationery_store: "Stationery Store",
            shop_service_storage: "Storage Facility",
            shop_service_tailor: "Tailor Shop",
            shop_service_tanning_salon: "Tanning Salon",
            shop_service_tattoo: "Tattoo Parlor",
            shop_service_thrift_vintage: "Thrift / Vintage Store",
            shop_service_toys_games: "Toy / Game Store",
            shop_service_travel_agency: "Travel Agency",
            shop_service_used_bookstore: "Used Bookstore",
            shop_service_video_games: "Video Game Store",
            shop_service_video_store: "Video Store",
            shop_service_warehouse_store: "Warehouse Store",
            shop_service_watch_repair: "Watch Repair Shop"
          },
          "Travel & Transport": {
            travel_transport_airport: "Airport",
            travel_transport_bike: "Bike Rental / Bike Share",
            travel_transport_boat_ferry: "Boat or Ferry",
            travel_transport_border_crossing: "Border Crossing",
            travel_transport_bus_station: "Bus Station",
            travel_transport_bus_stop: "Bus Stop",
            travel_transport_cable_car: "Cable Car",
            travel_transport_hotel: "Hotel",
            travel_transport_intersection: "Intersection",
            travel_transport_light_rail: "Light Rail",
            travel_transport_lounge: "Travel Lounge",
            travel_transport_moving_target: "Moving Target",
            travel_transport_pier: "Pier",
            travel_transport_rental_car: "Rental Car Location",
            travel_transport_rest_areas: "Rest Area",
            travel_transport_road: "Road",
            travel_transport_rv_park: "RV Park",
            travel_transport_street: "Street",
            travel_transport_subway: "Subway",
            travel_transport_taxi: "Taxi",
            travel_transport_toll_booth: "Toll Booth",
            travel_transport_toll_plaza: "Toll Plaza",
            travel_transport_tourist_information: "Tourist Information Center",
            travel_transport_train_station: "Train Station",
            travel_transport_tram: "Tram",
            travel_transport_travel: "General Travel",
            travel_transport_tunnel: "Tunnel"
          }
        },
        opening_hours: "Opening hours",
        operators: {
          errors: {
            nonexistent_operator: "There are no operators with this %{field}."
          }
        },
        overview: {
          about_ship: "About",
          overview: "Overview",
          view_options: {
            view: "View",
            view_accommodation: "Accommodation",
            view_dining: "Dining",
            view_enrichment: "Enrichment",
            view_entertainment: "Entertainment",
            view_health_fitness: "Health & Fitness",
            view_kids_and_teens: "Kids & Teens"
          }
        },
        page_attributes_category: "Category",
        page_attributes_description: "*Description",
        page_attributes_email: "Email",
        page_attributes_facebook_url: "Facebook url",
        page_attributes_telephone: "*Telephone",
        page_attributes_ticketing_info: "Ticketing info",
        page_attributes_ticketing_url: "Ticketing url",
        page_attributes_title: "*Title",
        page_attributes_twitter_url: "Twitter url",
        page_attributes_video_url: "Video url",
        page_attributes_website_url: "Website url",
        page_categories: {
          Accommodation: {
            accommodation_bed_breakfast: "Bed & Breakfast",
            accommodation_campsite: "Campsite",
            accommodation_holiday_park: "Holiday Park",
            accommodation_holiday_resort: "Holiday Resort",
            accommodation_hostel: "Hostel",
            accommodation_hotel: "Hotel",
            accommodation_self_catering: "Self Catering",
            accommodation_serviced_apartment: "Serviced Apartment"
          },
          Attractions: {
            attractions_aquarium: "Aquarium",
            attractions_castle: "Castle",
            attractions_heritage_site: "Heritage Site",
            attractions_historic_monuments: "Historic Monuments",
            attractions_historic_site: "Historic Site",
            attractions_national_park: "National Park",
            attractions_palace: "Palace",
            attractions_theme_park: "Theme Park",
            attractions_visitor_attraction: "Visitor Attraction",
            attractions_water_park: "Water Park",
            attractions_zoo: "Zoo"
          },
          Education: {
            education_college: "College",
            education_nursery_preschool: "Nursery & Preschool",
            education_school: "School",
            education_student_centre: "Student Centre",
            education_university: "University"
          },
          Entertainment: {
            entertainment_cinema: "Cinema",
            entertainment_comedy_club: "Comedy Club",
            entertainment_event_space: "Event Space",
            entertainment_karaoke_bar: "Karaoke Bar",
            entertainment_museum: "Museum",
            entertainment_music_venue: "Music Venue",
            entertainment_performing_arts_venue: "Performing Arts Venue",
            entertainment_recreation_centre: "Recreation Centre",
            entertainment_stadium: "Stadium",
            entertainment_theatre: "Theatre"
          },
          Event: {
            event_carnival: "Carnival",
            event_christmas_market: "Christmas Market",
            event_circus: "Circus",
            event_conference: "Conference",
            event_convention: "Convention",
            event_fair: "Fair",
            event_farmers_market: "Farmers Market",
            event_festival: "Festival",
            event_fete: "Fete",
            event_market: "Market",
            event_music_festival: "Music Festival",
            event_street_fair: "Street Fair"
          },
          "Food & Drink": {
            food_drink_asian_restaurant: "Asian Restaurant",
            food_drink_bakery: "Bakery",
            food_drink_beer_garden: "Beer Garden",
            food_drink_brazilian_restaurant: "Brazilian Restaurant",
            food_drink_brewery: "Brewery",
            food_drink_buffet: "Buffet",
            food_drink_burger_joint: "Burger Joint",
            food_drink_cafe: "Caf\xe9",
            food_drink_cake_shop: "Cake Shop",
            food_drink_chinese_restaurant: "Chinese Restaurant",
            food_drink_cocktail_bar: "Cocktail Bar",
            food_drink_coffee_shop: "Coffee Shop",
            food_drink_creperie: "Creperie",
            food_drink_deli: "Deli",
            food_drink_dessert_shop: "Dessert Shop",
            food_drink_dim_sum_restaurant: "Dim Sum Restaurant",
            food_drink_diner: "Diner",
            food_drink_donut_shop: "Donut Shop",
            food_drink_fast_food_restaurant: "Fast Food Restaurant",
            food_drink_fish_chips_shop: "Fish & Chips Shop",
            food_drink_food_court: "Food Court",
            food_drink_french_restaurant: "French Restaurant",
            food_drink_greek_restaurant: "Greek Restaurant",
            food_drink_hot_dog_joint: "Hot Dog Joint",
            food_drink_ice_cream_shop: "Ice Cream Shop",
            food_drink_indian_restaurant: "Indian Restaurant",
            food_drink_italian_restaurant: "Italian Restaurant",
            food_drink_japanese_restaurant: "Japanese Restaurant",
            food_drink_juice_bar: "Juice Bar",
            food_drink_kosher_restaurant: "Kosher Restaurant",
            food_drink_mexican_restaurant: "Mexican Restaurant",
            food_drink_noodle_house: "Noodle House",
            food_drink_pie_shop: "Pie Shop",
            food_drink_pizza_place: "Pizza Place",
            food_drink_pubs_bars: "Pubs & Bars",
            food_drink_restaurant: "Restaurant",
            food_drink_sandwich_place: "Sandwich Place",
            food_drink_seafood_restaurant: "Seafood Restaurant",
            food_drink_spanish_restaurant: "Spanish Restaurant",
            food_drink_speciality_food: "Speciality Food",
            food_drink_sports_bar: "Sports Bar",
            food_drink_steakhouse: "Steakhouse",
            food_drink_sushi_restaurant: "Sushi Restaurant",
            food_drink_takeaway: "Takeaway",
            food_drink_tapas_restaurant: "Tapas Restaurant",
            food_drink_tea_room: "Tea Room",
            food_drink_wine_bar: "Wine Bar"
          },
          Health: {
            health_dentist: "Dentist",
            health_health_beauty: "Health & Beauty",
            health_hospital: "Hospital",
            health_medical_practice: "Medical Practice,",
            health_optician: "Optician",
            health_pharmacy: "Pharmacy"
          },
          Leisure: {
            leisure_arcade: "Arcade",
            leisure_art_gallery: "Art Gallery",
            leisure_beach: "Beach",
            leisure_boat_charters: "Boat Charters",
            leisure_botanical_garden: "Botanical Garden",
            leisure_bowling_alley: "Bowling Alley",
            leisure_bridge: "Bridge",
            leisure_casino: "Casino",
            leisure_community_centre: "Community Centre",
            leisure_country_park: "Country Park",
            leisure_farm: "Farm",
            leisure_forest: "Forest",
            leisure_garden: "Garden",
            leisure_go_karting: "Go Karting",
            leisure_golf_club: "Golf Club",
            leisure_gym_fitness_centre: "Gym / Fitness Centre",
            leisure_harbour_marina: "Harbour / Marina",
            leisure_lake: "Lake",
            leisure_laser_tag: "Laser Tag",
            leisure_library: "Library",
            leisure_lighthouse: "Lighthouse",
            leisure_mini_golf: "Mini Golf",
            leisure_nature_preserve: "Nature Reserve",
            leisure_nightclub: "Nightclub",
            leisure_park: "Park",
            leisure_pedestrian_plaza: "Pedestrian Plaza",
            leisure_playground: "Playground",
            leisure_racetrack: "Racetrack",
            leisure_rafting: "Rafting",
            leisure_riding_stable: "Riding Stable",
            leisure_river: "River",
            leisure_scenic_lookout: "Scenic Lookout",
            leisure_ski_snow_sports: "Ski / Snow Sports",
            leisure_social_club: "Social Club",
            leisure_spa: "Spa",
            leisure_swimming_pool: "Swimming Pool",
            leisure_tours: "Tours"
          },
          Religion: {
            religion_church: "Church",
            religion_mosque: "Mosque",
            religion_religious_organisation: "Religious Organisation",
            religion_synagogue: "Synagogue",
            religion_temple: "Temple"
          },
          Service: {
            service_bank: "Bank",
            service_beauty_salon: "Beauty Salon",
            service_car_wash: "Car Wash",
            service_cheque_cashing_service: "Cheque Cashing Service",
            service_garage_autocentre: "Garage & Autocentre",
            service_government_building: "Government Building",
            service_internet_cafe: "Internet Cafe",
            service_it_services: "IT Services",
            service_laundry_service: "Laundry Service",
            service_left_luggage: "Left Luggage",
            service_nail_salon: "Nail Salon",
            service_office: "Office",
            service_petrol_service_stations: "Petrol & Service Stations",
            service_post_office: "Post Office",
            service_shipping_service: "Shipping Service",
            service_shoe_repair: "Shoe Repair",
            service_storage_facility: "Storage Facility",
            service_tattooing_piercing: "Tattooing & Piercing"
          },
          Shopping: {
            shopping_arts_crafts_store: "Arts & Crafts Store",
            shopping_bike_shop: "Bike Shop",
            shopping_book_shop: "Book Shop",
            shopping_butchers: "Butchers",
            shopping_chocolate_shop: "Chocolate Shop",
            shopping_clothing_store: "Clothing Store",
            shopping_convenience_store: "Convenience Store",
            shopping_department_store: "Department Store",
            shopping_discount_store: "Discount Store",
            shopping_diy_hardware_supplies: "DIY & Hardware Supplies",
            shopping_electronics_store: "Electronics Store",
            shopping_fancy_dress: "Fancy Dress",
            shopping_furniture_shop: "Furniture Shop",
            shopping_garden_centre: "Garden Centre",
            shopping_gift_shop: "Gift Shop",
            shopping_gun_shop: "Gun Shop",
            shopping_hairdresser: "Hairdresser",
            shopping_health_food_shop: "Health Food Shop",
            shopping_hobby_shop: "Hobby Shop",
            shopping_jeweller: "Jeweller",
            shopping_lingerie_shop: "Lingerie Shop",
            shopping_luggage_shop: "Luggage Shop",
            shopping_mobile_phone_shop: "Mobile Phone Shop",
            shopping_music_dvds: "Music & DVDs",
            shopping_newsagent: "Newsagent",
            shopping_outlet_shop: "Outlet Shop",
            shopping_perfume_shop: "Perfume Shop",
            shopping_shoe_shop: "Shoe Shop",
            shopping_shopping_centre: "Shopping Centre",
            shopping_souvenir_shop: "Souvenir Shop",
            shopping_specialist_retailer: "Specialist Retailer",
            shopping_sportswear_equipment: "Sportswear & Equipment",
            shopping_stationers: "Stationers",
            shopping_sweet_shop: "Sweet Shop",
            shopping_technology: "Technology",
            shopping_tour_operator: "Tour Operator",
            shopping_toys_games: "Toys & Games",
            shopping_travel_agent: "Travel Agent"
          },
          Travel: {
            travel_airport: "Airport",
            travel_boat_or_ferry: "Boat or Ferry",
            travel_bus_station: "Bus Station",
            travel_car_park: "Car Park",
            travel_car_rental: "Car Rental",
            travel_coach_station: "Coach Station",
            travel_cruise_port: "Cruise Port",
            travel_cruise_terminal: "Cruise Terminal",
            travel_parking: "Parking",
            travel_taxi: "Taxi",
            travel_train_station: "Train Station",
            travel_tram: "Tram",
            travel_underground: "Underground",
            travel_visitor_information_centre: "Visitor Information Centre"
          }
        },
        please_wait_html: "Please wait&hellip;",
        policy: {
          cookie: "Cookie Policy",
          privacy_policy: "Privacy Policy",
          terms_and_conditions: "T&Cs"
        },
        ports: {
          errors: {
            nonexistent_port: "There are no ports with this %{field}."
          }
        },
        postcode: "Postcode",
        preview: "Preview",
        price_pp: "Price pp",
        price_range_per_person: "Price range (per person)",
        publish_at_date: "*Publish Date",
        publish_at_time: "*Publish Time",
        publish_at_without_zone: "*Publish at",
        pundit: {
          custom_error: "You do not currently have the permissions to access this content.",
          default_error: "You cannot perform this action.",
          defaults: {
            "create?": "You cannot create a %{name}!",
            "destroy?": "You cannot delete this %{name}!",
            "edit?": "You cannot edit this %{name}!",
            "index?": "You cannot list %{name}!",
            "new?": "You cannot create a %{name}!",
            "operator?": "You do not have permission to perform this action",
            "place?": "You do not have permission to perform this action",
            "show?": "You cannot view this %{name}!",
            "sign_in_as?": "You do not have permission to perform this action",
            "update?": "You cannot update this %{name}!"
          }
        },
        ransack: {
          all: "all",
          and: "and",
          any: "any",
          asc: "ascending",
          attribute: "attribute",
          combinator: "combinator",
          condition: "condition",
          desc: "descending",
          or: "or",
          predicate: "predicate",
          predicates: {
            blank: "is blank",
            cont: "contains",
            cont_all: "contains all",
            cont_any: "contains any",
            does_not_match: "doesn't match",
            does_not_match_all: "doesn't match all",
            does_not_match_any: "doesn't match any",
            end: "ends with",
            end_all: "ends with all",
            end_any: "ends with any",
            eq: "equals",
            eq_all: "equals all",
            eq_any: "equals any",
            "false": "is false",
            gt: "greater than",
            gt_all: "greater than all",
            gt_any: "greater than any",
            gteq: "greater than or equal to",
            gteq_all: "greater than or equal to all",
            gteq_any: "greater than or equal to any",
            "in": "in",
            in_all: "in all",
            in_any: "in any",
            lt: "less than",
            lt_all: "less than all",
            lt_any: "less than any",
            lteq: "less than or equal to",
            lteq_all: "less than or equal to all",
            lteq_any: "less than or equal to any",
            matches: "matches",
            matches_all: "matches all",
            matches_any: "matches any",
            not_cont: "doesn't contain",
            not_cont_all: "doesn't contain all",
            not_cont_any: "doesn't contain any",
            not_end: "doesn't end with",
            not_end_all: "doesn't end with all",
            not_end_any: "doesn't end with any",
            not_eq: "not equal to",
            not_eq_all: "not equal to all",
            not_eq_any: "not equal to any",
            not_in: "not in",
            not_in_all: "not in all",
            not_in_any: "not in any",
            not_null: "is not null",
            not_start: "doesn't start with",
            not_start_all: "doesn't start with all",
            not_start_any: "doesn't start with any",
            "null": "is null",
            present: "is present",
            start: "starts with",
            start_all: "starts with all",
            start_any: "starts with any",
            "true": "is true"
          },
          search: "search",
          sort: "sort",
          value: "value"
        },
        read_less: "Read less",
        read_more: "Read more",
        recaptcha_expired: "reCAPTCHA expired",
        reconfirmation_pending_html: "<strong>Note:</strong> The updated title for this %{name} has not yet been verified!",
        region_attributes_area: "City or National Park",
        region_attributes_country: "*Country",
        region_attributes_county: "County",
        region_attributes_district: "District",
        region_attributes_state: "*State",
        required_market_filter: "Market filter is required",
        river: "River",
        search: "Search",
        search_placeholder_html: "Search&hellip;",
        search_results: "Search Results",
        select_blank: "- select %{name} -",
        select_cruise_date: "Select Cruise Date",
        select_cruise_length: "Select Cruise Length",
        ship: {
          adults_only_options: {
            adults_only: "Adult only",
            itinerary_dependent: "Children welcome on select itineraries",
            kids_allowed: "Family friendly",
            no_kids: "Children not advised"
          },
          currency_options: {
            AUS: "Australian Dollar ($)",
            CNY: "Chinese Yuan (\xa5)",
            EUR: "Euro (\u20ac)",
            GBP: "Pound Sterling (\xa3)",
            JPY: "Japanese Yen (\xa5)",
            NOK: "Norwegian Krone (kr)",
            USD: "US Dollar ($)"
          },
          dining_experience_options: {
            complimentary: "Complimentary",
            cover: "Cover charge may apply",
            snacks: "Snacks/ light bites"
          },
          dining_food_type_options: {
            american: "American",
            asian: "Asian",
            bakery: "Bakery",
            bbq: "BBQ & Grill",
            british: "British",
            brunch: "Brunch",
            buffet: "Buffet",
            cafe: "Cafe",
            caribbean: "Caribbean",
            casual: "Casual",
            chef: "Chef's Table",
            classic: "Classic",
            continental: "Continental",
            fast: "Fast Food",
            fine: "Fine Dining",
            french: "French",
            fusion: "Fusion",
            gastro: "Gastro Pub",
            gelato: "Gelato",
            gourmet: "Gourmet",
            healthy: "Healthy Option",
            ice_cream: "Ice Cream Parlour",
            indian: "Indian",
            international: "International",
            italian: "Italian",
            japanese: "Japanese",
            mexican: "Mexican",
            new_orleans: "New Orleans",
            pacific: "Pacific Rim",
            pizzeria: "Pizzeria",
            regional: "Regionally Inspired",
            room: "Room Service",
            seafood: "Seafood",
            south_american: "South American",
            spanish: "Spanish",
            steakhouse: "Steakhouse",
            surf_turf: "Steak & Seafood",
            sushi: "Sushi",
            tapas: "Tapas",
            themed: "Themed",
            varies: "Varies",
            wine: "Wine & Dine"
          },
          kids_facilities_options: {
            available: "Children's facilities available",
            itinerary_dependent: "Children\u2019s facilities available on select itineraries",
            none: "Children's facilities not available"
          },
          nursery_options: {
            babysitting: "Babysitting available",
            cabin_and_nursery: "Nursery available in cabin and nursery",
            in_cabin_only: "Nursery available in cabin only",
            none: " Nursery not available",
            nursery: "Nursery available"
          },
          select_ships: "Select Ships",
          ship: "Ship",
          smoking_options: {
            balcony: "Smoking on balconies only",
            balcony_cabins: "Smoking allowed on balconies, cabins & designated areas",
            cabins_designated: "Smoking allowed in select cabins & designated areas only",
            "e-cig": "E-cigarettes only",
            none: "Smoke-free ship",
            smoking_permitted: "Smoking allowed",
            some: "Smoking in designated areas only"
          }
        },
        ship_adults_only_options: {
          adults_only: "Adult only",
          itinerary_dependent: "Children welcome on select itineraries",
          kids_allowed: "Family friendly",
          no_kids: "Children not advised"
        },
        ship_kids_facilities_options: {
          available: "Children's facilities available",
          itinerary_dependent: "Children\u2019s facilities available on select itineraries",
          none: "Children's facilities not available"
        },
        ship_nursery_options: {
          babysitting: "Babysitting available",
          cabin_and_nursery: "Nursery available in cabin and nursery",
          in_cabin_only: "Nursery available in cabin only",
          none: " Nursery not available",
          nursery: "Nursery available"
        },
        ship_smoking_options: {
          balcony: "Smoking on balconies only",
          balcony_cabins: "Smoking allowed on balconies, cabins & designated areas",
          cabins_designated: "Smoking allowed in select cabins & designated areas only",
          "e-cig": "E-cigarettes only",
          none: "Smoke-free ship",
          smoking_permitted: "Smoking allowed",
          some: "Smoking in designated areas only"
        },
        ship_type_options: {
          ferry: "Ferry",
          ocean: "Ocean",
          river: "River"
        },
        ships: {
          ship_not_found: "Ship not found"
        },
        show: "View",
        show_model: "View %{name}",
        show_results: "Show Results",
        simple_form: {
          error_notification: {
            default_message: "Please review the problems below:"
          },
          hints: {
            defaults: {
              video_url: "copy a link from Youtube or Vimeo"
            }
          },
          include_blanks: {
            select_map_style: {
              mapbox_style: "Select Map Style"
            },
            select_theme: {
              theme: "Select Theme"
            },
            team_owners: {
              user_id: "Select Owner"
            },
            widgets_events_list: {
              mapbox_style: "Select Map Style",
              theme: "Select Theme"
            },
            widgets_meet_the_fleets: {
              mapbox_style: "Select Map Style",
              theme: "Select Theme"
            },
            widgets_places_list: {
              mapbox_style: "Select Map Style",
              theme: "Select Theme"
            },
            widgets_promotions_list: {
              mapbox_style: "Select Map Style",
              theme: "Select Theme"
            }
          },
          labels: {
            defaults: {
              tag_list: "List of tags",
              video_url: "Video (YouTube)"
            },
            place: {
              area_id: "City / Village / National Park"
            },
            region: {
              level: "Level",
              name: "Name"
            },
            user: {
              interests: "Interested in"
            },
            widgets_events_list: {
              theme: {
                hide_file_types: "Show filter by Type of file",
                hide_quick_filters: "Include Quick Filters",
                hide_search: "Include Search"
              }
            },
            widgets_places_list: {
              theme: {
                hide_file_types: "Show filter by Type of file",
                hide_quick_filters: "Include Quick Filters",
                hide_search: "Include Search"
              }
            },
            widgets_promotions_list: {
              theme: {
                hide_file_types: "Show filter by Type of file",
                hide_quick_filters: "Include Quick Filters",
                hide_search: "Include Search"
              }
            },
            widgets_theme: {
              title: "Give your theme a name"
            },
            widgets_widget: {
              theme: {
                hide_file_types: "Show filter by Type of file",
                hide_quick_filters: "Include Quick Filters",
                hide_search: "Include Search"
              }
            }
          },
          no: "No",
          placeholders: {
            attachment: {
              scope: 'Enter scope (e.g. "main")'
            },
            defaults: {
              description: "Describe your page\u2026",
              email: "Email address",
              facebook_url: "http://www.facebook.com/example",
              introduction: "Enter an introduction\u2026",
              latitude: "Latitude",
              longitude: "Longitude",
              tag_list: "Enter tags separated by commas (e.g. Cruise, Restaurant, Family)",
              teaser: "Enter teaser text\u2026",
              telephone: "Telephone",
              ticketing_info: "Enter ticketing information\u2026",
              ticketing_url: "http://www.tickets-example.com/example",
              title: "Enter a title",
              twitter_url: "http://www.twitter.com/example",
              video_url: "http://youtu.be/abcdef",
              website_url: "http://www.example.com"
            },
            event: {
              page: {
                ticketing_url: "http://www.tickets-example.com/event-tickets",
                title: "Enter the event title"
              }
            },
            place: {
              business_telephone: "Main business telephone number",
              county_state: "County or State",
              page: {
                description: "Describe your place\u2026",
                email: "Business or place email address",
                telephone: "Business or place telephone",
                title: "A business name or place name"
              },
              postcode: "Postcode or Zipcode",
              street_address: "Place name or street address",
              town_city: "Town or City"
            },
            promotion: {
              page: {
                ticketing_url: "http://www.tickets-example.com/promotion-tickets",
                title: "Enter the promotion title"
              }
            },
            ship: {
              celebrity_ties: "Enter Celebrities which are tied in...",
              gratuities: "Describe the gratuities procedure",
              introduction: "Introduce and describe the ship\u2026",
              page: {
                title: "Ship name"
              },
              ship_class: "Ship class",
              teaser: "Enter teaser text for the ship\u2026",
              unique_feature: "Enter unique feature text"
            },
            user: {
              current_password: "Your current password",
              edit: {
                email: "Your new email address",
                password: "Your new password",
                password_confirmation: "\u2026 and again please"
              },
              email: "Your email address",
              full_name: "Your full name",
              password: "Password",
              password_confirmation: "\u2026 and again please"
            },
            widgets_brochure_rack: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                border_thickness_count: "Thickness",
                header_text: "Header",
                items_per_row_count: "Brochures per shelf",
                max_groups_per_page_count: "Shelves per page",
                search_box_placeholder_text: "Search placeholder"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_events_list: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_places_list: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_promotions_list: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_ship_iframe: {
              expected_width: "Expected Width",
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_widget: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            }
          },
          prompts: {
            widgets_events_list: {
              sort_by: "Sort By"
            },
            widgets_places_list: {
              sort_by: "Sort By"
            },
            widgets_promotions_list: {
              sort_by: "Sort By"
            }
          },
          required: {
            html: '<abbr data-tooltip class="tip-left" title="required">*</abbr>',
            mark: "*",
            text: "required"
          },
          yes: "Yes"
        },
        site_name: "Widgety",
        smoking: "Smoking",
        sorry_the_requested_cruise_is_no_longer_available: "Sorry, the requested cruise is no longer available",
        source: "Source",
        start_at_date: "*Start Date",
        start_at_time: "*Start Time",
        start_at_without_zone: "*Start at",
        street_address: "*Street address",
        successfully_created: "Successfully Created",
        suite: "Suite",
        support: {
          array: {
            last_word_connector: ", and ",
            two_words_connector: " and ",
            words_connector: ", "
          }
        },
        terms_app: {
          categories: {
            index: {
              table: {
                name: "Name",
                show: "Show",
                terms: "Terms"
              },
              title: "Policies"
            },
            show: {
              "new": "New Term",
              table: {
                content: "Content",
                id: "Id",
                show: "Show",
                state: "State",
                updated_at: "Updated at"
              },
              title: "%{name} Policy"
            }
          },
          mails: {
            admin: {
              subject: "User %{email} sent a portability request"
            },
            completed: {
              subject: "Your data is available"
            },
            progress: {
              subject: "Your data is being handled"
            }
          },
          menu: {
            policies: "Policies",
            portability_requests: "Portability requests",
            user_pending_policies: "My pending policies",
            user_portability_requests: "My Portability requests"
          },
          misc: {
            are_you_sure: "Are you sure?",
            back: "Back",
            download: "Download",
            edit: "Edit",
            save: "Save",
            show: "Show"
          },
          portability_requests: {
            index: {
              destroyed: "Successfully deleted",
              empty: "There is no requests",
              states: {
                completed: "Completed",
                pending: "Pending",
                progress: "In Progress"
              },
              table: {
                confirm: "Confirm",
                created_at: "Created at",
                destroy: "Delete",
                state: "State",
                user: "User"
              },
              title: "Pending requests"
            }
          },
          sign_out: "Logout",
          states: {
            draft: "Draft",
            published: "Published"
          },
          sub_title: "PolicyManager",
          terms: {
            edit: {
              description: "Description",
              error: "saving term",
              state: "State",
              title: "Edit %{name} term"
            },
            index: {
              button: "New Term",
              table: {
                category: "Policy",
                description: "Description",
                destroy: "Delete",
                edit: "Edit",
                show: "Show",
                updated_at: "Updated at"
              },
              title: "Terms"
            },
            "new": {
              button: "Button",
              created: "Successfully created",
              description: "Description",
              destroyed: "Successfully deleted",
              error: "error saving term",
              state: "State",
              title: "%{name} new term",
              updated: "Successfully updated"
            },
            show: {
              last_update: "Last update",
              table: {
                name: "Name",
                show: "Show",
                terms: "Terms"
              },
              title: "Term"
            }
          },
          title: "PolicyManager",
          user_portability_requests: {
            index: {
              button: "New portability request",
              created: "Information Request Submitted!",
              empty: "There are no portability requests",
              has_pending: "You have one pending information request, you can't create another one yet.",
              states: {
                completed: "Completed",
                pending: "Pending",
                progress: "In progress"
              },
              table: {
                created_at: "Created at",
                destroy: "Delete",
                file: "File",
                state: "State"
              },
              title: "My portability requests"
            }
          },
          user_terms: {
            pending: {
              empty: "There are no pending policies",
              title: "My pending policies"
            },
            show: {
              accepted: {
                message: "Accepted policy",
                not_now: "No not now",
                question: "Change your mind?",
                reject: "Reject"
              },
              pending: {
                agree: "Accept",
                message: "Please accept this policy",
                not_now: "No not now"
              }
            }
          }
        },
        thank_you_for_your_enquiry: "Thank you for your enquiry, one of our agents will contact you at the requested time.",
        time: {
          am: "am",
          formats: {
            "default": "%a, %d %b %Y %H:%M:%S %z",
            devise: {
              mailer: {
                invitation_instructions: {
                  accept_until_format: "%B %d, %Y %I:%M %p"
                }
              }
            },
            extra: "%d %B, %Y %H:%M:%S %Z",
            "long": "%d %B %Y %H:%M",
            "short": "%d %b %H:%M",
            w3c: "%Y-%m-%dT%H:%M%:z"
          },
          pm: "pm"
        },
        to: "to",
        uk_departures: "UK Departures",
        uk_ireland_departures: "UK & Ireland Departures",
        unfollow: "Unfollow",
        update: "Save changes",
        update_success: "%{name} was successfully updated",
        update_widget_code: "Update embed code",
        useful_to_know: "Useful to Know",
        user_terms: {
          show: {
            accept: "I agree the %{policy_name}",
            reject: "I do not agree, please delete my account"
          }
        },
        users: {
          errors: {
            invalid_id: {
              role: "One or more roles not found",
              team: "One or more teams not found"
            }
          }
        },
        validates_timeliness: {
          error_value_formats: {
            date: "%Y-%m-%d",
            datetime: "%Y-%m-%d %H:%M:%S",
            time: "%H:%M:%S"
          }
        },
        validations_failed: "Validations failed",
        view: "View",
        view_itineraries: "View Itineraries",
        view_itinerary: "View Itinerary",
        view_model: "View %{name}",
        view_or_amend_search: "View or Amend Search",
        view_ship: "View Ship",
        views: {
          pagination: {
            first: "&laquo; First",
            last: "Last &raquo;",
            next: "Next &rsaquo;",
            previous: "&lsaquo; Prev",
            truncate: "&hellip;"
          }
        },
        welcome: {
          dashboard: {
            no_team_message: "You do not currently have a team. Please contact your account manager to get access to Widgety."
          },
          pageable_panel: {
            list_style_class: {
              Event: "Event",
              Operator: "Operator",
              Place: "Place",
              Promotion: "Promo",
              Ship: "Ship"
            }
          }
        },
        widget_types: {
          brochure_rack: "Brochure Rack",
          cruise_tour_search: "Cruise & Tour Search",
          events_list: "Events List",
          meet_the_fleet: "Cruise Search",
          pageable: "Page",
          places_list: "Places List",
          promotions_list: "Promotions List",
          search: "Search",
          ship_iframe: "Ship iFrame",
          widget: "No type"
        },
        widgets: {
          widgets: {
            edit: {
              step_title: {
                completed: "Widget Creation is completed",
                content: "Choose your content",
                customization: "Customize your Widget",
                layout: "Choose your layout",
                owner: "Select an Owner for your Widget",
                preview: "Preview your Widget",
                ship_content: "Select a ship",
                title: "Name your Widget",
                type: "What type of Widget would you like to create?"
              },
              title: "Create my Widget"
            },
            steps: {
              customization: {
                expected_width_tooltip: "By providing the expected width of the Widget after embed, we can provide you with optimised images which will make the iFrame load faster."
              },
              layout: {
                choose_me: "Choose Me",
                coming_soon: "Coming Soon",
                designs: {
                  collapsed: "Collapsed",
                  "default": "Default",
                  grid: "Grid",
                  list: "List",
                  old: "Old"
                }
              },
              type: {
                cruise_brochures: "Cruise Brochures",
                cruise_trade_news: "Cruise Trade News",
                cruise_trade_promotions: "Cruise Trade Promotions",
                map_and_guide: "Map & Guide",
                meet_the_fleet: "Meet The Fleet",
                my_brochures: "My Brochures",
                my_events: "My Events",
                my_promotions: "My Promotions",
                ship_iframe: "Ship iFrame",
                ship_visits: "Ship Visits",
                virtual_tic: "Virtual TIC",
                whats_on_guide: "What's on Guide"
              }
            }
          }
        },
        will_paginate: {
          container_aria_label: "Pagination",
          next_aria_label: "Next page",
          next_label: "&gt;",
          page_aria_label: "Page %{page}",
          page_entries_info: {
            multi_page: "Displaying %{model} %{from} - %{to} of %{count} in total",
            multi_page_html: "Displaying %{model} <b>%{from}&nbsp;-&nbsp;%{to}</b> of <b>%{count}</b> in total",
            single_page: {
              one: "Displaying 1 %{model}",
              other: "Displaying all %{count} %{model}",
              zero: "No %{model} found"
            },
            single_page_html: {
              one: "Displaying <b>1</b> %{model}",
              other: "Displaying <b>all&nbsp;%{count}</b> %{model}",
              zero: "No %{model} found"
            }
          },
          page_gap: "&hellip;",
          previous_aria_label: "Previous page",
          previous_label: "&lt;"
        },
        your_cruise_preferences: "Your Cruise Preferences",
        your_details: "Your Details"
      },
      "en-US": {
        "1st_pax_price": "1st Pax Price",
        "2nd_pax_price": "2nd Pax Price",
        Africa: "Africa",
        Alaska: "US (Alaska)",
        Amazon: "Amazon",
        Antarctica: "Antarctica",
        Arctic: "Arctic",
        Asia: "Asia",
        "Atlantic Islands": "Atlantic Islands",
        "Australia & New Zealand": "Australia & New Zealand",
        "Black Sea": "Black Sea",
        Brahmaputra: "Brahmaputra",
        "Caledonian Canal": "Caledonian Canal",
        Canada: "Canada",
        Caribbean: "Caribbean",
        Chobe: "Chobe",
        "Columbia and Snake": "Columbia and Snake",
        Danube: "Danube",
        Dnieper: "Dnieper",
        Dordogne: "Dordogne",
        Douro: "Douro",
        "Dutch Waterways": "Dutch Waterways",
        "East Coast US": "US (East Coast)",
        "Eastern Europe": "Europe (East)",
        Elbe: "Elbe",
        "Europe (Mediterranean)": "Europe (Mediterranean)",
        "Europe (North)": "Europe (North)",
        "Europe (West)": "Europe (West)",
        "French Canals": "French Canals",
        Ganges: "Ganges",
        Garonne: "Garonne",
        Gironde: "Gironde",
        Guadalquivir: "Guadalquivir",
        Guadiana: "Guadiana",
        "Indian Ocean": "Indian Ocean",
        Irrawaddy: "Irrawaddy",
        Kerala: "Kerala",
        Loire: "Loire",
        Magdalena: "Magdalena",
        Main: "Main",
        Marne: "Marne",
        Mediterranean: "Europe (Mediterranean)",
        Mekong: "Mekong",
        Meuse: "Meuse",
        "Middle East": "Middle East",
        Mississippi: "Mississippi",
        Moselle: "Moselle",
        Mystery: "Mystery Cruise",
        "Mystery Cruise": "Mystery",
        Nile: "Nile",
        "Norther Europe": "Europe (North)",
        "Northern Europe": "Europe (North)",
        Oder: "Oder",
        Pacific: "Pacific",
        "Panama Canal": "Panama Canal",
        Po: "Po",
        Repositioning: "Repositioning",
        Rhine: "Rhine",
        Rhone: "Rhone",
        "Russian Waterways": "Russian Waterways",
        Saone: "Saone",
        Seine: "Seine",
        Shannon: "Shannon",
        "South America": "South America",
        Thames: "Thames",
        Transatlantic: "Transatlantic",
        "US (Alaska)": "US (Alaska)",
        "US (East Coast)": "US (East Coast)",
        "US (West Coast)": "US (West Coast)",
        "West Coast US": "US (West Coast)",
        "Western Europe": "Europe (West)",
        "World-wide": "World-wide",
        Yangtze: "Yangtze",
        Zambezi: "Zambezi",
        accept: "Accept",
        actions: "Actions",
        activerecord: {
          attributes: {
            event: {
              title: "Event title"
            },
            page: {
              cover_image: "Cover photo",
              profile_image: "Profile picture",
              title: "Title"
            },
            place: {
              country_code: "Country",
              county_state: "County / State",
              postcode: "Postcode",
              street_address: "Street Address",
              title: "Place name",
              town_city: "Town / City"
            },
            promotion: {
              title: "Promotion title"
            },
            ship: {
              ship_class: "Class",
              ship_type: "Type",
              title: "Ship name"
            },
            widget: {
              limit: "Max items",
              title: "Widget name",
              widget_type: "Widget type"
            }
          },
          errors: {
            messages: {
              already_confirmed: "was already confirmed",
              record_invalid: "Validation failed: %{errors}",
              restrict_dependent_destroy: {
                many: "Cannot delete record because dependent %{record} exist",
                one: "Cannot delete record because a dependent %{record} exists"
              }
            },
            models: {
              place: {
                attributes: {
                  latitude: {
                    blank: "can't be blank, please enter manually"
                  },
                  longitude: {
                    blank: "can't be blank, please enter manually"
                  }
                }
              }
            }
          },
          models: {
            attachment: {
              one: "Attachment",
              other: "Attachments"
            },
            event: {
              one: "Event",
              other: "Events"
            },
            gallery: {
              one: "Gallery",
              other: "Galleries"
            },
            operator: {
              one: "Operator",
              other: "Operators"
            },
            page: {
              one: "Page",
              other: "Pages"
            },
            place: {
              one: "Place",
              other: "Places"
            },
            promotion: {
              one: "Promotion",
              other: "Promotions"
            },
            ship: {
              one: "Ship",
              other: "Ships"
            },
            user: {
              one: "User",
              other: "Users"
            },
            "widgets/widget": {
              one: "Widget",
              other: "Widgets"
            }
          }
        },
        admin: {
          actions: {
            bulk_delete: {
              breadcrumb: "Multiple delete",
              bulk_link: "Delete selected %{model_label_plural}",
              menu: "Multiple delete",
              title: "Delete %{model_label_plural}"
            },
            clone: {
              breadcrumb: "Clone",
              menu: "Clone",
              title: "Clone"
            },
            dashboard: {
              breadcrumb: "Dashboard",
              menu: "Dashboard",
              title: "Site Administration"
            },
            "delete": {
              breadcrumb: "Delete",
              done: "deleted",
              link: "Delete '%{object_label}'",
              menu: "Delete",
              title: "Delete %{model_label} '%{object_label}'"
            },
            edit: {
              breadcrumb: "Edit",
              done: "updated",
              link: "Edit this %{model_label}",
              menu: "Edit",
              title: "Edit %{model_label} '%{object_label}'"
            },
            edit_page: {
              breadcrumb: "edit_page",
              menu: "Edit page",
              title: "Edit page"
            },
            "export": {
              breadcrumb: "Export",
              bulk_link: "Export selected %{model_label_plural}",
              done: "exported",
              link: "Export found %{model_label_plural}",
              menu: "Export",
              title: "Export %{model_label_plural}"
            },
            history_index: {
              breadcrumb: "History",
              menu: "History",
              title: "History for %{model_label_plural}"
            },
            history_show: {
              breadcrumb: "History",
              menu: "History",
              title: "History for %{model_label} '%{object_label}'"
            },
            index: {
              breadcrumb: "%{model_label_plural}",
              menu: "List",
              title: "List of %{model_label_plural}"
            },
            "new": {
              breadcrumb: "New",
              done: "created",
              link: "Add a new %{model_label}",
              menu: "Add new",
              title: "New %{model_label}"
            },
            show: {
              breadcrumb: "%{object_label}",
              menu: "Show",
              title: "Details for %{model_label} '%{object_label}'"
            },
            show_in_app: {
              menu: "Show in app"
            },
            synchronize_maps: {
              breadcrumb: "Synchronize Maps",
              menu: "Synchronize Maps",
              title: "Synchronize Maps"
            }
          },
          "export": {
            click_to_reverse_selection: "Click to reverse selection",
            confirmation: "Export to %{name}",
            csv: {
              col_sep: "Column separator",
              col_sep_help: "Leave blank for default ('%{value}')",
              default_col_sep: ",",
              encoding_to: "Encode to",
              encoding_to_help: "Choose output encoding. Leave empty to let current input encoding untouched: (%{name})",
              header_for_association_methods: "%{name} [%{association}]",
              header_for_root_methods: "%{name}",
              skip_header: "No header",
              skip_header_help: "Do not output a header (no fields description)"
            },
            display: "Display %{name}: %{type}",
            empty_value_for_associated_objects: "<empty>",
            fields_from: "Fields from %{name}",
            fields_from_associated: "Fields from associated %{name}",
            options_for: "Options for %{name}",
            select: "Select fields to export",
            select_all_fields: "Select All Fields"
          },
          flash: {
            error: "%{name} failed to be %{action}",
            model_not_found: "Model '%{model}' could not be found",
            noaction: "No actions were taken",
            object_not_found: "%{model} with id '%{id}' could not be found",
            successful: "%{name} successfully %{action}"
          },
          form: {
            all_of_the_following_related_items_will_be_deleted: "? The following related items may be deleted or orphaned:",
            are_you_sure_you_want_to_delete_the_object: "Are you sure you want to delete this %{model_name}",
            basic_info: "Basic info",
            bulk_delete: "The following objects will be deleted, which may delete or orphan some of their related dependencies:",
            cancel: "Cancel",
            char_length_of: "length of",
            char_length_up_to: "length up to",
            confirmation: "Yes, I'm sure",
            new_model: "%{name} (new)",
            one_char: "character",
            optional: "Optional",
            required: "Required",
            save: "Save",
            save_and_add_another: "Save and add another",
            save_and_edit: "Save and edit"
          },
          home: {
            name: "Home"
          },
          js: {
            between_and_: "Between ... and ...",
            contains: "Contains",
            date: "Date ...",
            ends_with: "Ends with",
            "false": !1,
            is_blank: "Is blank",
            is_exactly: "Is exactly",
            is_present: "Is present",
            last_week: "Last week",
            no_objects: "No objects found",
            number: "Number ...",
            starts_with: "Starts with",
            this_week: "This week",
            today: "Today",
            too_many_objects: "Too many objects, use search box above",
            "true": !0,
            yesterday: "Yesterday"
          },
          loading: "Loading...",
          misc: {
            add_filter: "Add filter",
            add_new: "Add new",
            ago: "ago",
            bulk_menu_title: "Selected items",
            chose_all: "Choose all",
            chosen: "Chosen %{name}",
            clear_all: "Clear all",
            down: "Down",
            filter: "Filter",
            log_out: "Log out",
            more: "Plus %{count} more %{models_name}",
            navigation: "Navigation",
            navigation_static_label: "Links",
            refresh: "Refresh",
            remove: "Remove",
            search: "Search",
            show_all: "Show all",
            up: "Up"
          },
          pagination: {
            next: "Next &raquo;",
            previous: "&laquo; Prev",
            truncate: "\u2026"
          },
          table_headers: {
            changes: "Changes",
            created_at: "Date/Time",
            item: "Item",
            last_created: "Last created",
            message: "Message",
            model_name: "Model name",
            records: "Records",
            username: "User"
          },
          toggle_navigation: "Toggle navigation"
        },
        adults_only: "Adults Only",
        api: {
          locale_is_required: "The parameter 'locale' is required, you must specify it. Available locales: %{languages}.",
          not_access_to_operator_images: "You do not have access to the destination images for this operator",
          not_found_locales: "The requested language is not available. Available languages: %{languages}.",
          not_found_ship_locales: "The requested language is not available for this ship. Available languages: %{languages}.",
          operator_not_recognised: "Operator ID not recognised"
        },
        apply: "Apply",
        are_you_sure: "Are you sure?",
        are_you_sure_leave: "Are you sure you want to leave this page?",
        attachments: {
          edit: {
            header: "Attachment Details",
            update: "Update Details"
          }
        },
        attachments_copy: "Please check the name of your files for typos. Also make sure to include the name of your\nPage at the beginning so users can easily find them in a Brochure Rack. You can also set a\ndrop-off date to make sure it disappears when you want it to\n",
        attributes: {
          created_at: "Created on",
          email: "Email address",
          end_at: "End on",
          end_at_without_zone: "End on",
          facebook_url: "Facebook URL",
          publish: "Publish on",
          publish_at_without_zone: "Publish on",
          start_at: "Start on",
          start_at_without_zone: "Start on",
          ticketing_info: "Ticketing information",
          ticketing_url: "Ticketing URL",
          twitter_url: "Twitter URL",
          updated_at: "Last updated on",
          video_url: "Video URL",
          website_url: "Website URL"
        },
        availability: {
          availability: "Availability",
          available: "Available",
          fully_booked: "Fully Booked",
          wait_list: "Wait List"
        },
        back: "Back",
        back_to_results: "Back to Results",
        balcony: "Balcony",
        bulk_uploader: {
          step: {
            image_upload: {
              event_promotion: "Please select a logo and a cover image for each of the items below. To make things easier, we have preselected the same images as your Place. You can replace them by clicking on the \u2018Select Image\u2019 button and either select another, or upload a new one in your gallery.",
              place: "Please select a logo and a cover image for each of the items below."
            }
          }
        },
        cabin_grades: "Cabin Grades",
        cabin_grades_list: {
          balcony: "Balcony",
          inside: "Interior",
          outside: "Exterior",
          suite: "Suite"
        },
        cabins: "Cabins",
        cancel: "Cancel",
        check_out: {
          accommodation: "Accommodation",
          check_out_the: "Check out the",
          dining_option: "Dining",
          enrichment: "Enrichment",
          entertainment: "Entertainment",
          health_fitness: "Health & Fitness",
          kid_teen: "Kids & Teens"
        },
        chosen_placeholder_html: "Search for and choose %{name}",
        clear: "Clear",
        clear_all: "Clear all",
        confirm: "Confirm",
        confirmation_pending_html: "<strong>Note:</strong> This %{name} has not yet been verified!",
        create: "Create",
        create_model: "Create a new %{name}",
        create_success: "%{name} was successfully created",
        create_success_unconfirmed: "%{name} was successfully created, but is awaiting verification",
        create_widget: "Embed this %{name}",
        create_widget_code: "Create embed code",
        cruise_line: {
          cruise_line: "Cruise Line",
          select_operator: "Select Operator"
        },
        cruise_tour_search: {
          dining_experience_options: {
            complimentary: "Included",
            cover: "Additional Cost",
            snacks: "Snacks & Light Bites"
          },
          dining_food_type_options: {
            African: "African",
            Exclusive: "Exclusive",
            "Food Hall": "Food Hall",
            Greek: "Greek",
            Hawaiian: "Hawaiian",
            Mediterranean: "Mediterranean",
            Mezze: "Mezze",
            Vegetarian: "Vegetarian",
            american: "American",
            asian: "Asian",
            bakery: "Bakery",
            bbq: "BBQ & Grill",
            british: "British",
            brunch: "Brunch",
            buffet: "Buffet",
            cafe: "Caf\xe9",
            caribbean: "Caribbean",
            casual: "Casual",
            chef: "Chef's Table",
            classic: "Classic",
            continental: "Continental",
            "cooking school": "Cooking School",
            fast: "Fast Food",
            fine: "Fine Dining",
            french: "French",
            fusion: "Fusion",
            gastro: "Gastro Pub",
            gelato: "Gelato",
            gourmet: "Gourmet",
            healthy: "Healthy Option",
            ice_cream: "Ice Cream Parlour",
            indian: "Indian",
            international: "International",
            italian: "Italian",
            japanese: "Japanese",
            "korean bbq": "Korean BBQ",
            mexican: "Mexican",
            new_orleans: "New Orleans",
            pacific: "Pacific Rim",
            pizzeria: "Pizzeria",
            regional: "Regionally Inspired",
            room: "Room Service",
            seafood: "Seafood",
            south_american: "South American",
            spanish: "Spanish",
            steakhouse: "Steakhouse",
            surf_turf: "Steak & Seafood",
            sushi: "Sushi",
            tapas: "Tapas",
            themed: "Themed",
            varies: "Varies",
            wine: "Wine & Dine"
          },
          enquiry: {
            call_time: "Select Call Time",
            email: "Email",
            first_name: "First Name",
            last_name: "Last Name",
            make_an_enquiry: "Make an Inquiry",
            message: "Message",
            number_of_travellers: "Number of Guests",
            phone: "Phone",
            post_code: "ZIP Code",
            thank_you_for_your_enquiry: "Thank you for your inquiry, one of our agents will contact you at the requested time.",
            title: "Select Title",
            your_details: "Your Details",
            your_preferences: "Your Preference"
          },
          find_a_holiday: {
            adults_only: "Adults Only",
            dates_travelling: "Dates Traveling",
            destination: "Destination",
            duration: "Duration",
            family_cruises: "Family Cruises",
            from: "From",
            from_price_range: "From",
            holiday_type: "Vacation Type",
            loading: "Loading...",
            operators: "Operators",
            price_range: "Price Range (per guest)",
            select_cruise_date: "Select Dates/Month",
            select_destination: "Select Destination",
            select_duration: "Select Duration",
            select_holiday_type: "Select Vacation Type",
            select_operators: "Select Operators",
            select_ships: "Select Ships",
            select_theme: "Select Theme",
            ships: "Ship",
            show_results: "Show Results",
            start_from: "Start From",
            theme: "Theme",
            to: "to",
            to_price_range: "to",
            uk_departures: "UK Departures",
            uk_ireland_departures: "UK & Ireland Departures"
          },
          find_a_ship: {
            cruise_line: "Cruise Line",
            ocean: "Ocean",
            river: "River",
            select_operators: "Select Operators",
            select_ships: "Select Ships",
            ships: "Ships",
            show_results: "Show Results"
          },
          holiday_details: {
            Classic: "Classic",
            Expedition: "Expedition",
            Luxury: "Luxury",
            Premium: "Premium",
            "Premium Resort": "Premium Resort",
            Resort: "Resort",
            "Ultra Luxury": "Ultra Luxury",
            back_to_results: "Back to Results",
            days: "Days",
            details: "Details",
            duration: "Duration",
            end_date: "End Date",
            ends_at: "Ends At",
            from: "From",
            highlights: "Highlights",
            introduction: "Introduction",
            itinerary: {
              arrive: "Arrive",
              cruise: "Cruise",
              day: "Days",
              depart: "Depart",
              flight: "Flight",
              itinerary: "Itinerary",
              land: "Land"
            },
            pricing: {
              "1st_person_price": "1st Guest Price",
              "2nd_person_price": "2nd Guest Price",
              availability: "Availability",
              available: "Available",
              balcony: "Balcony",
              cabin_grade: "Cabin Categories",
              cabin_type: "Cabin Type",
              closed: "Closed",
              double_price_pp: "Double Price PP",
              enquire: "Inquire",
              from: "From",
              fully_booked: "Fully Booked",
              guarantee: "Guarantee",
              inside: "Inside",
              outside: "Oceanview",
              pricing: "Pricing",
              room: "Room",
              single_price: "Single Price",
              suite: "Suite",
              wait_list: "Waitlist"
            },
            region: "Region",
            ship_name: "Ship Name",
            start_date: "Start Date",
            starts_at: "Starts At",
            style: "Style",
            theme: "Theme",
            view_ship: "View Ship",
            whats_included: "What's included"
          },
          search_results: {
            clear_all: "Clear All",
            days: "Days",
            from: "From",
            learn_more: "Learn More",
            per_person: "Per Guest",
            search_results: "Search Results",
            view_or_amend_search: "View or Amend Search",
            view_ship: "View Ship"
          },
          ship_details: {
            about_ship: "About",
            accommodation: "Staterooms",
            back_to_overview: "Back to Overview",
            check_out: {
              accommodation: "Staterooms",
              check_out_the: "Check Out The",
              deckplans: "Deck Plans",
              dining: "Dining",
              dining_experience: "Experience",
              dining_food: "Food",
              enrichment: "Enrichment",
              entertainment: "Entertainment",
              health_fitness: "Health & Fitness",
              useful_to_know: "Good to know",
              younger_travellers: "Activities for Kids & Teens"
            },
            deckplans: "Deck Plans",
            dining: "Dining",
            enrichment: "Enrichment",
            entertainment: "Entertainment",
            health_fitness: "Health & Fitness",
            itineraries: "Itineraries",
            overview: "Overview",
            read_less: "Read less",
            read_more: "Read more",
            useful_to_know: "Good to know",
            view: {
              accommodation: "View Staterooms",
              dining: "View Dining",
              enrichment: "View Enrichment",
              entertainment: "View Entertainment",
              health_fitness: "View Health & Fitness",
              itineraries: "Itineraries",
              younger_travellers: "Discover Activities for Kids & Teens"
            },
            younger_travellers: "Younger Travelers"
          },
          tabs: {
            find_a_holiday: "Find a Vacation",
            find_a_ship: "Find a Ship"
          }
        },
        currencies: {
          symbol: "$"
        },
        date: {
          abbr_day_names: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
          abbr_month_names: [null, "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          day_names: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          formats: {
            "default": "%d-%m-%Y",
            "long": "%d %B %Y",
            "short": "%d %b"
          },
          month_names: [null, "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
          order: ["year", "month", "day"]
        },
        dates: {
          date_to_before_date_from: "date_to cannot be before date_from",
          dates_in_the_past: "Dates cannot be in the past",
          invalid_date_format: "Date is not in the format YYYY-MM-DD",
          no_dates_found: "No holiday dates found with matching criteria",
          not_found_holidays: "No holidays found with matching criterias"
        },
        dates_travelling: {
          dates_travelling: "Dates Travelling",
          greyed_out_dates_indicate_no_cruise_available: "*Greyed out dates indicate no cruise available",
          see_months_tab: "(see MONTHS tab)"
        },
        datetime: {
          distance_in_words: {
            about_x_hours: {
              one: "about 1 hour",
              other: "about %{count} hours"
            },
            about_x_months: {
              one: "about 1 month",
              other: "about %{count} months"
            },
            about_x_years: {
              one: "about 1 year",
              other: "about %{count} years"
            },
            almost_x_years: {
              one: "almost 1 year",
              other: "almost %{count} years"
            },
            half_a_minute: "half a minute",
            less_than_x_minutes: {
              one: "less than a minute",
              other: "less than %{count} minutes"
            },
            less_than_x_seconds: {
              one: "less than 1 second",
              other: "less than %{count} seconds"
            },
            over_x_years: {
              one: "over 1 year",
              other: "over %{count} years"
            },
            x_days: {
              one: "1 day",
              other: "%{count} days"
            },
            x_minutes: {
              one: "1 minute",
              other: "%{count} minutes"
            },
            x_months: {
              one: "1 month",
              other: "%{count} months"
            },
            x_seconds: {
              one: "1 second",
              other: "%{count} seconds"
            }
          },
          prompts: {
            day: "Day",
            hour: "Hour",
            minute: "Minute",
            month: "Month",
            second: "Seconds",
            year: "Year"
          }
        },
        days: {
          friday: "Friday",
          monday: "Monday",
          saturday: "Saturday",
          sunday: "Sunday",
          thursady: "Thursday",
          tuesday: "Tuesday",
          wednesday: "Wednesday"
        },
        deckplans: "Deckplans",
        depart: "Depart",
        departure_port: {
          departure_port: "Departure Port",
          select_port: "Select Port"
        },
        departure_time: "Departure Time",
        description: "Description",
        destination: {
          destination: "Destination",
          see_regions_tab: "(see REGIONS tab)",
          select_destinations: "Select Destinations"
        },
        destroy: "Delete",
        destroy_language: "Remove language",
        destroy_model: "Delete %{name}",
        destroy_success: "%{name} was successfully deleted",
        devise: {
          confirmations: {
            confirmed: "Your email address has been successfully confirmed.",
            send_instructions: "You will receive an email with instructions for how to confirm your email address in a few minutes.",
            send_paranoid_instructions: "If your email address exists in our database, you will receive an email with instructions for how to confirm your email address in a few minutes."
          },
          custom_confirmations: {
            confirmed: "Your email address has been successfully confirmed.",
            send_instructions: "You will receive an email with instructions for how to confirm your email address in a few minutes.",
            send_paranoid_instructions: "If your email address exists in our database, you will receive an email with instructions for how to confirm your email address in a few minutes."
          },
          custom_passwords: {
            no_token: "You can't access this page without coming from a password reset email. If you do come from a password reset email, please make sure you used the full URL provided.",
            send_instructions: "You will receive an email with instructions on how to reset your password in a few minutes.",
            send_paranoid_instructions: "If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.",
            updated: "Your password has been changed successfully. You are now signed in.",
            updated_not_active: "Your password has been changed successfully."
          },
          custom_registrations: {
            delete_modal: {
              are_you_sure: "Are you sure you want to delete your account?",
              "delete": "Delete my Account",
              modal_title: "Warning: Account deletion",
              warning: "Doing so means you will no longer be able to edit or add content to your pages. If you are unsure about what to do or what this means, please contact your Account Manager."
            },
            destroyed: "Bye! Your account has been successfully cancelled. We hope to see you again soon.",
            edit: {
              cookie: "Cookie Policy",
              "delete": "Delete my account",
              "export": "Download my user information",
              privacy_policy: "Privacy Policy",
              terms_and_conditions: "Terms & Conditions",
              update: "Update Information"
            },
            signed_up: "Welcome! You have signed up successfully.",
            signed_up_but_inactive: "You have signed up successfully. However, we could not sign you in because your account is not yet activated.",
            signed_up_but_locked: "You have signed up successfully. However, we could not sign you in because your account is locked.",
            signed_up_but_unconfirmed: "A message with a confirmation link has been sent to your email address. Please follow the link to activate your account.",
            update_needs_confirmation: "Your account has been updated successfully, but we need to verify your new email address. Please check your email and follow the confirm link to confirm your new email address.",
            updated: "Your account has been updated successfully.",
            validation_errors: "The following errors occurred during registration: \n %{errors}"
          },
          custom_sessions: {
            already_signed_out: "Signed out successfully.",
            signed_in: "Signed in successfully.",
            signed_out: "Signed out successfully."
          },
          custom_unlocks: {
            send_instructions: "You will receive an email with instructions for how to unlock your account in a few minutes.",
            send_paranoid_instructions: "If your account exists, you will receive an email with instructions for how to unlock it in a few minutes.",
            unlocked: "Your account has been unlocked successfully. Please sign in to continue."
          },
          edit_account: "Edit account",
          email_label: "Email",
          failure: {
            already_authenticated: "You are already signed in.",
            inactive: "Your account is not activated yet.",
            invalid: "Invalid login or password.",
            invited: "You have a pending invitation, accept it to finish creating your account.",
            last_attempt: "You have one more attempt before your account is locked.",
            locked: "Your account is locked.",
            not_found_in_database: "Invalid email address or password.",
            timeout: "Your session expired. Please sign in again to continue.",
            unauthenticated: "You need to sign in or sign up before continuing.",
            unconfirmed: "You have to confirm your email address before continuing."
          },
          forgot_your_password: "Forgot your password?",
          invitations: {
            edit: {
              header: "Set your password",
              submit_button: "Set my password"
            },
            invitation_removed: "Your invitation was removed.",
            invitation_token_invalid: "The invitation token provided is not valid!",
            "new": {
              header: "Send invitation",
              submit_button: "Send an invitation"
            },
            no_invitations_remaining: "No invitations remaining",
            send_instructions: "An invitation email has been sent to %{email}.",
            updated: "Your password was set successfully. You are now signed in.",
            updated_not_active: "Your password was set successfully."
          },
          invite_user: "Invite user",
          link_expired: {
            instructions: "Please enter your email address below to receive a new one.",
            title: "This password reset link has expired."
          },
          mailer: {
            confirmation_instructions: {
              subject: "Confirmation instructions"
            },
            invitation_instructions: {
              accept: "Accept invitation",
              accept_until: "This invitation will be due in %{due_date}.",
              hello: "Hello %{email}!",
              ignore: "If you don't want to accept the invitation, please ignore this email.<br />Your account won't be created until you access the link above and set your password.",
              someone_invited_you: "Someone has invited you to join Widgety, you can accept it through the link below.",
              subject: "Invitation instructions"
            },
            reset_password_instructions: {
              subject: "Reset password instructions"
            },
            unlock_instructions: {
              subject: "Unlock instructions"
            }
          },
          omniauth_callbacks: {
            failure: 'Could not authenticate you from %{kind} because "%{reason}".',
            success: "Successfully authenticated from %{kind} account."
          },
          password_label: "Password",
          password_validation_block: {
            password_length: "Be at least 8 characters long",
            password_lowercase: "Have at least one lowercase",
            password_number_case: "Have at least one number",
            password_special_character: "Have at least one special character",
            password_uppercase: "Have at least one uppercase",
            special_characters: "(!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~)",
            title: "Password must:"
          },
          passwords: {
            no_token: "You can't access this page without coming from a password reset email. If you do come from a password reset email, please make sure you used the full URL provided.",
            send_instructions: "You will receive an email with instructions on how to reset your password in a few minutes.",
            send_paranoid_instructions: "If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.",
            updated: "Your password has been changed successfully. You are now signed in.",
            updated_not_active: "Your password has been changed successfully."
          },
          policy_not_accepted: "You must accept privacy policy.",
          registrations: {
            destroyed: "Bye! Your account has been successfully cancelled. We hope to see you again soon.",
            signed_up: "Welcome! You have signed up successfully.",
            signed_up_but_inactive: "You have signed up successfully. However, we could not sign you in because your account is not yet activated.",
            signed_up_but_locked: "You have signed up successfully. However, we could not sign you in because your account is locked.",
            signed_up_but_unconfirmed: "A message with a confirmation link has been sent to your email address. Please follow the link to activate your account.",
            update_needs_confirmation: "Your account has been updated successfully, but we need to verify your new email address. Please check your email and follow the confirm link to confirm your new email address.",
            updated: "Your account has been updated successfully.",
            validation_errors: "The following errors occurred during registration: \n %{errors}"
          },
          remember_label: "Remember Me",
          reset_password: {
            title_after_sending: "Check Your Email",
            title_of_reset_password: "Set New Password",
            title_of_the_link_expired: "Link expired",
            title_of_the_unreceived_email: "No Email Received?"
          },
          reset_password_label: "Reset Password",
          sessions: {
            already_signed_out: "Signed out successfully.",
            signed_in: "Signed in successfully.",
            signed_out: "Signed out successfully."
          },
          sign_in: "Log In",
          sign_in_button: "Next",
          sign_in_placeholder: "Your username or email address",
          sign_out: "Sign out",
          sign_up: "Sign Up",
          success_registration: {
            button_name: "Back to Log in",
            description: "Your account has been successfully created.",
            title: "Account Created"
          },
          success_reset_password: {
            description: "Your password has been successfully reset.",
            title: "Password reset"
          },
          unlocks: {
            send_instructions: "You will receive an email with instructions for how to unlock your account in a few minutes.",
            send_paranoid_instructions: "If your account exists, you will receive an email with instructions for how to unlock it in a few minutes.",
            unlocked: "Your account has been unlocked successfully. Please sign in to continue."
          },
          unreceived_email_rules: {
            expectation: "Wait up to 10 min. Sometimes it might be a bit late.",
            issues: "If you still have issues, please contact our <a class='unreceived-email__support-message' href='mailto:support@widgety.co.uk'>support team</a>.",
            resend: "Re-send with button below.",
            spam_checker: "Check your Promotions and Spam folders. Sometimes it might end up there. Make sure you move it into your main folder.",
            title: "Follow the guidelines below:"
          },
          username_label: "Username"
        },
        dining: {
          experience: "Experience",
          food: "Food"
        },
        dining_experience_options: {
          complimentary: "Complimentary",
          cover: "Cover charge may apply",
          snacks: "Snacks/ light bites"
        },
        dining_food_type_options: {
          american: "American",
          asian: "Asian",
          bakery: "Bakery",
          bbq: "BBQ & Grill",
          british: "British",
          brunch: "Brunch",
          buffet: "Buffet",
          cafe: "Cafe",
          caribbean: "Caribbean",
          casual: "Casual",
          chef: "Chef's Table",
          classic: "Classic",
          continental: "Continental",
          fast: "Fast Food",
          fine: "Fine Dining",
          french: "French",
          fusion: "Fusion",
          gastro: "Gastro Pub",
          gelato: "Gelato",
          gourmet: "Gourmet",
          healthy: "Healthy Option",
          ice_cream: "Ice Cream Parlour",
          indian: "Indian",
          international: "International",
          italian: "Italian",
          japanese: "Japanese",
          mexican: "Mexican",
          new_orleans: "New Orleans",
          pacific: "Pacific Rim",
          pizzeria: "Pizzeria",
          regional: "Regionally Inspired",
          room: "Room Service",
          seafood: "Seafood",
          south_american: "South American",
          spanish: "Spanish",
          steakhouse: "Steakhouse",
          surf_turf: "Steak & Seafood",
          sushi: "Sushi",
          tapas: "Tapas",
          themed: "Themed",
          varies: "Varies",
          wine_dine: "Wine & Dine"
        },
        duplicate: "Duplicate",
        duplicate_model: "Duplicate %{name}",
        duplicate_success: "%{name} was successfully duplicated",
        edit: "Edit",
        edit_model: "Edit %{name}",
        edit_widget: "Edit embedded widget for this %{name}",
        end_at_date: "*End Date",
        end_at_time: "*End Time",
        end_at_without_zone: "*End at",
        enquire: "Enquire",
        enquiry: {
          enquiry: "Enquiry",
          placeholders: {
            cabin_type: "Select Cabin Type",
            call_time: "Select Call Time",
            email: "E-mail",
            first_name: "First Name",
            last_name: "Last Name",
            message: "Message",
            number_of_passengers: "Number of passengers",
            phone: "Phone",
            post_code: "Post code",
            title: "Select Title"
          }
        },
        enrichment: "Enrichment",
        enumerize: {
          teams_team: {
            interests: {
              cruise_and_travel: "Cruise & Travel",
              visitor_attractions_and_tourism: "Visitor Attractions & Tourism"
            }
          },
          user: {
            interests: {
              cruise_and_travel: "Cruise & Travel",
              visitor_attractions_and_tourism: "Visitor Attractions & Tourism"
            }
          }
        },
        enums: {
          fare: {
            availability: {
              available: "Available",
              closed: "Closed",
              guarantee: "Guarantee",
              wait_list: "Waitlist"
            }
          },
          permissions: {
            booking_permission: {
              currency: {
                AUD: "AUD",
                CAD: "CAD",
                EUR: "EUR",
                GBP: "GBP",
                NZD: "NZD",
                USD: "USD"
              }
            }
          },
          regions: {
            cabin_type: {
              balcony: "Balcony",
              family_of_4: "Family of 4",
              inside: "Inside",
              no_cabin_type_preference: "No Preference",
              outside: "Outside",
              single: "Single",
              suite: "Suite"
            },
            call_time: {
              afternoon: "Afternoon",
              asap: "ASAP",
              evening: "Evening",
              morning: "Morning",
              no_call_time_preference: "No Preference"
            },
            level: {
              area: "City/Town/National Park",
              area1: "First level area",
              continent: "Continent",
              country: "Country",
              county: "County",
              district: "District",
              nested_area: "Area",
              place1: "Place 1",
              place2: "Place 2",
              state: "State"
            }
          },
          widgets: {
            cruise_tour_searches: {
              enquiry: {
                cabin_type: {
                  balcony: "Balcony",
                  family_of_4: "Family of 4",
                  inside: "Inside",
                  no_cabin_type_preference: "No cabin type preference",
                  outside: "Oceanview",
                  single: "Single",
                  suite: "Suite"
                },
                call_time: {
                  afternoon: "Afternoon",
                  asap: "Asap",
                  evening: "Evening",
                  morning: "Morning",
                  no_call_time_preference: "No cabin type preference"
                },
                title: {
                  miss: "Miss",
                  mr: "Mr.",
                  mrs: "Mrs.",
                  ms: "Ms."
                }
              }
            },
            meet_the_fleets: {
              enquiry: {
                cabin_type: {
                  balcony: "Balcony",
                  family_of_4: "Family of 4",
                  inside: "Inside",
                  no_cabin_type_preference: "No cabin type preference",
                  outside: "Outside",
                  single: "Single",
                  suite: "Suite"
                },
                call_time: {
                  afternoon: "Afternoon",
                  asap: "Asap",
                  evening: "Evening",
                  morning: "Morning",
                  no_call_time_preference: "No call time preference"
                },
                title: {
                  miss: "Miss",
                  mr: "Mr",
                  mrs: "Mrs",
                  ms: "Ms"
                }
              }
            },
            widget: {
              design: {
                "default": "Default",
                grid: "Grid",
                list: "List",
                old: "Old"
              }
            }
          }
        },
        errors: {
          format: "%{attribute} %{message}",
          messages: {
            accepted: "must be accepted",
            after: "must be after %{restriction}",
            already_confirmed: "was already confirmed, please try signing in",
            before: "must be before %{restriction}",
            blank: "can't be blank",
            character_validation: "Must include at least one special character",
            confirmation: "doesn't match %{attribute}",
            confirmation_period_expired: "needs to be confirmed within %{period}, please request a new one",
            email_invalid: "Invalid email.",
            empty: "can't be empty",
            equal_to: "must be equal to %{count}",
            even: "must be even",
            exclusion: "is reserved",
            expired: "has expired, please request a new one",
            greater_than: "must be greater than %{count}",
            greater_than_or_equal_to: "must be greater than or equal to %{count}",
            inclusion: "is not included in the list",
            invalid: "is invalid",
            invalid_date: "is not a valid date",
            invalid_datetime: "is not a valid datetime",
            invalid_time: "is not a valid time",
            is_at: "must be at %{restriction}",
            less_than: "must be less than %{count}",
            less_than_or_equal_to: "must be less than or equal to %{count}",
            lower_validation: "Must include at least one lowercase letter",
            model_invalid: "%{errors}",
            new_password_valid: "Your new password cannot be the same as your current password.",
            not_a_number: "is not a number",
            not_an_integer: "must be an integer",
            not_equal: "Password does not match!",
            not_found: "Email not found.",
            not_locked: "was not locked",
            not_saved: {
              one: "1 error prohibited this %{resource} from being saved:",
              other: "%{count} errors prohibited this %{resource} from being saved:"
            },
            number_validation: "Must include at least one number",
            odd: "must be odd",
            on_or_after: "must be on or after %{restriction}",
            on_or_before: "must be on or before %{restriction}",
            other_than: "must be other than %{count}",
            present: "must be blank",
            taken: "has already been taken",
            too_long: "is too long (maximum is %{count} characters)",
            too_short: "is too short (minimum is %{count} characters)",
            upper_validations: "Must include at least one uppercase letter",
            wrong_length: "is the wrong length (should be %{count} characters)"
          }
        },
        exterior: "Exterior",
        family_cruises: "Family Cruises",
        find_a_cruise: "Find A Cruise",
        find_a_ship: "Find A Ship",
        fly_cruise: "Fly Cruise",
        follow: "Follow",
        free: "FREE",
        from: "From",
        full_name: "Full name",
        galleries: {
          form: {
            create_gallery: "CREATE GALLERY",
            update: "Update Details"
          },
          galleries: {
            Attachment: "File",
            Image: "Image"
          }
        },
        general: {
          errors: {
            record_not_found: "Record not found"
          }
        },
        global_search: {
          blank_message: "No results found.",
          search_panel: {
            all: "All",
            events: "Events",
            operators: "Operators",
            places: "Places",
            promotions: "Promotions",
            ships: "Ships"
          },
          title: "Search"
        },
        hellip_html: "&hellip;",
        helpers: {
          page_entries_info: {
            entry: {
              one: "entry",
              other: "entries",
              zero: "entries"
            },
            more_pages: {
              display_entries: "Displaying %{entry_name} <b>%{first}&nbsp;-&nbsp;%{last}</b> of <b>%{total}</b> in total"
            },
            one_page: {
              display_entries: {
                one: "Displaying <b>1</b> %{entry_name}",
                other: "Displaying <b>all %{count}</b> %{entry_name}",
                zero: "No %{entry_name} found"
              }
            }
          },
          select: {
            prompt: "Please select"
          },
          submit: {
            create: "Create %{model}",
            submit: "Save %{model}",
            update: "Update %{model}"
          }
        },
        holidays: {
          errors: {
            conflicting_holiday_type_filters: "You cannot use the holiday_types and exact_holiday_types filters at the same time."
          }
        },
        home: "Home",
        ignore: "Ignore",
        info: "Info",
        interests: {
          cruise_and_travel: "Cruise & Travel",
          visitor_attractions_and_tourism: "Visitor Attractions & Tourism"
        },
        interior: "Interior",
        international_departures: "International Departures",
        itineraries: "Itineraries",
        itinerary: "Itinerary",
        kids: "Kids",
        kids_teens: "Kids & Teens",
        language_name: {
          en: "English",
          es: "Spanish",
          fr: "France"
        },
        latitude: "*Latitude",
        layouts: {
          cookie_policy_bar: {
            learn_more: "Learn more",
            notification: "This website uses cookies to ensure you get the best experience on our website."
          },
          policy_modal: {
            gdpr_intro: "To comply the GDPR (General Data Protection Regulation) taking effect on 25th of May, we have to update our Privacy Policy and have made some changes to your User Account. These changes aim to make you fully aware of where your data is stored, and what we use it for, as well as giving you easy access to all the settings allowing you to delete, and amend that information.",
            ok: "Sounds good, Let's have a look",
            title: "Update to our Privacy Settings"
          }
        },
        length_of_cruise: {
          length_of_cruise: "Length of Cruise",
          nights: "nights"
        },
        link_error: "Link Error",
        loading: "Loading...",
        longitude: "*Longitude",
        make_an_enquiry: "Make an Enquiry",
        map: "Map",
        map_itinerary: "Map & Itinerary",
        meet_the_fleet: {
          cabins: {
            balcony: "Balcony",
            inside: "Interior",
            outside: "Exterior",
            suite: "Suite"
          },
          enquiry: {
            placeholders: {
              cabin_type: "Select Cabin Type",
              call_time: "Select Call Time",
              email: "E-mail",
              first_name: "First Name",
              last_name: "Last Name",
              message: "Message",
              number_of_passengers: "Number of passengers",
              phone: "Phone",
              post_code: "Post code",
              title: "Select Title"
            }
          }
        },
        min_search_characters: "Please use at least %{min} characters in your search term",
        more_info: "More Info",
        more_information: "More Information",
        name: "Name",
        nights: "Nights",
        number: {
          currency: {
            format: {
              delimiter: ",",
              format: "%u%n",
              precision: 2,
              separator: ".",
              significant: !1,
              strip_insignificant_zeros: !1,
              unit: "\xa3"
            }
          },
          format: {
            delimiter: ",",
            precision: 3,
            separator: ".",
            significant: !1,
            strip_insignificant_zeros: !1
          },
          human: {
            decimal_units: {
              format: "%n %u",
              units: {
                billion: "Billion",
                million: "Million",
                quadrillion: "Quadrillion",
                thousand: "Thousand",
                trillion: "Trillion",
                unit: ""
              }
            },
            format: {
              delimiter: "",
              precision: 3,
              significant: !0,
              strip_insignificant_zeros: !0
            },
            storage_units: {
              format: "%n %u",
              units: {
                "byte": {
                  one: "Byte",
                  other: "Bytes"
                },
                gb: "GB",
                kb: "KB",
                mb: "MB",
                tb: "TB"
              }
            }
          },
          percentage: {
            format: {
              delimiter: "",
              format: "%n%"
            }
          },
          precision: {
            format: {
              delimiter: ""
            }
          }
        },
        nursery: "Nursery",
        ocean: "Ocean",
        ok: "OK",
        old_page_categories: {
          "Arts & Entertainment": {
            arts_entertainment_aquarium: "Aquarium",
            arts_entertainment_arcade: "Arcade",
            arts_entertainment_art_gallery: "Art Gallery",
            arts_entertainment_billiards: "Pool Hall",
            arts_entertainment_bowling_alley: "Bowling Alley",
            arts_entertainment_casino: "Casino",
            arts_entertainment_circus: "Circus",
            arts_entertainment_comedy_club: "Comedy Club",
            arts_entertainment_concert_hall: "Concert Hall",
            arts_entertainment_country_dance_club: "Country Dance Club",
            arts_entertainment_disc_golf: "Disc Golf",
            arts_entertainment_entertainment: "General Entertainment",
            arts_entertainment_go_kart: "Go Kart Track",
            arts_entertainment_historic_site: "Historic Site",
            arts_entertainment_laser_tag: "Laser Tag",
            arts_entertainment_mini_golf: "Mini Golf",
            arts_entertainment_movie_theater: "Movie Theater",
            arts_entertainment_museum: "Museum",
            arts_entertainment_music_venue: "Music Venue",
            arts_entertainment_outdoor_sculpture: "Outdoor Sculpture",
            arts_entertainment_performing_arts: "Performing Arts Venue",
            arts_entertainment_public_art: "Public Art",
            arts_entertainment_racetrack: "Racetrack",
            arts_entertainment_roller_rink: "Roller Rink",
            arts_entertainment_salsa_club: "Salsa Club",
            arts_entertainment_stadium: "Stadium",
            arts_entertainment_street_art: "Street Art",
            arts_entertainment_theme_park: "Theme Park",
            arts_entertainment_water_park: "Water Park",
            arts_entertainment_zoo: "Zoo"
          },
          "College & University": {
            college_university_academic_building: "College Academic Building",
            college_university_administrative_building: "College Administrative Building",
            college_university_auditorium: "College Auditorium",
            college_university_bookstore: "College Bookstore",
            college_university_cafeteria: "College Cafeteria",
            college_university_classroom: "College Classroom",
            college_university_community_college: "Community College",
            college_university_education: "General College & University",
            college_university_frat_house: "Fraternity House",
            college_university_gym: "College Gym",
            college_university_lab: "College Lab",
            college_university_law_school: "Law School",
            college_university_library: "College Library",
            college_university_medical_school: "Medical School",
            college_university_quad: "College Quad",
            college_university_rec_center: "College Rec Center",
            college_university_residence_hall: "College Residence Hall",
            college_university_sorority_house: "Sorority House",
            college_university_stadium: "College Stadium",
            college_university_student_center: "Student Center",
            college_university_theater: "College Theater",
            college_university_trade_school: "Trade School",
            college_university_university: "University"
          },
          Event: {
            event_conference: "Conference",
            event_convention: "Convention",
            event_fair: "Street Fair",
            event_festival: "Festival",
            event_music_festival: "Music Festival",
            event_other_event: "Other Event",
            event_parade: "Parade",
            event_stoop_sale: "Stoop Sale"
          },
          Food: {
            food_afghan: "Afghan Restaurant",
            food_african: "African Restaurant",
            food_american: "American Restaurant",
            food_arepas: "Arepa Restaurant",
            food_argentinian: "Argentinian Restaurant",
            food_asian: "Asian Restaurant",
            food_australian: "Australian Restaurant",
            food_austrian: "Austrian Restaurant",
            food_bagels: "Bagel Shop",
            food_bakery: "Bakery",
            food_bbq: "BBQ Joint",
            food_belarusian: "Belarusian Restaurant",
            food_belgian: "Belgian Restaurant",
            food_bistro: "Bistro",
            food_brazilian: "Brazilian Restaurant",
            food_breakfast: "Breakfast Spot",
            food_bubble_tea: "Bubble Tea Shop",
            food_buffet: "Buffet",
            food_burgers: "Burger Joint",
            food_burritos: "Burrito Place",
            food_cafe: "Caf\xe9",
            food_cafeteria: "Cafeteria",
            food_cajun_creole: "Cajun / Creole Restaurant",
            food_cambodian: "Cambodian Restaurant",
            food_caribbean: "Caribbean Restaurant",
            food_caucasian: "Caucasian Restaurant",
            food_chinese: "Chinese Restaurant",
            food_coffee_shop: "Coffee Shop",
            food_comfort_food: "Comfort Food Restaurant",
            food_creperie: "Creperie",
            food_cuban: "Cuban Restaurant",
            food_cupcakes: "Cupcake Shop",
            food_czech: "Czech Restaurant",
            food_deli_bodega: "Deli / Bodega",
            food_desserts: "Dessert Shop",
            food_dim_sum: "Dim Sum Restaurant",
            food_diner: "Diner",
            food_distillery: "Distillery",
            food_donuts: "Donut Shop",
            food_dumplings: "Dumpling Restaurant",
            food_eastern_european: "Eastern European Restaurant",
            food_english: "English Restaurant",
            food_ethiopian: "Ethiopian Restaurant",
            food_falafel: "Falafel Restaurant",
            food_fast_food: "Fast Food Restaurant",
            food_filipino: "Filipino Restaurant",
            food_fish_chips: "Fish & Chips Shop",
            food_fondue: "Fondue Restaurant",
            food_food_truck: "Food Truck",
            food_french: "French Restaurant",
            food_fried_chicken: "Fried Chicken Joint",
            food_frozen_yogurt: "Frozen Yogurt",
            food_gastropub: "Gastropub",
            food_german: "German Restaurant",
            "food_gluten-free": "Gluten-free Restaurant",
            food_greek: "Greek Restaurant",
            food_halal: "Halal Restaurant",
            food_hawaiian: "Hawaiian Restaurant",
            food_himalayan: "Himalayan Restaurant",
            food_hot_dogs: "Hot Dog Joint",
            food_hotpot: "Hotpot Restaurant",
            food_hungarian: "Hungarian Restaurant",
            food_ice_cream: "Ice Cream Shop",
            food_indian: "Indian Restaurant",
            food_indonesian: "Indonesian Restaurant",
            food_irish: "Irish Pub",
            food_italian: "Italian Restaurant",
            food_japanese: "Japanese Restaurant",
            food_jewish: "Jewish Restaurant",
            food_juice_bar: "Juice Bar",
            food_korean: "Korean Restaurant",
            food_kosher: "Kosher Restaurant",
            food_latin_american: "Latin American Restaurant",
            food_mac_cheese: "Mac & Cheese Joint",
            food_malaysian: "Malaysian Restaurant",
            food_mediterranean: "Mediterranean Restaurant",
            food_mexican: "Mexican Restaurant",
            food_middle_eastern: "Middle Eastern Restaurant",
            food_modern_european: "Modern European Restaurant",
            food_molecular_gastronomy: "Molecular Gastronomy Restaurant",
            food_mongolian: "Mongolian Restaurant",
            food_moroccan: "Moroccan Restaurant",
            food_new_american: "New American Restaurant",
            food_pakistani: "Pakistani Restaurant",
            food_persian: "Persian Restaurant",
            food_peruvian: "Peruvian Restaurant",
            food_pie_shop: "Pie Shop",
            food_pizza: "Pizza Place",
            food_polish: "Polish Restaurant",
            food_portuguese: "Portuguese Restaurant",
            food_ramen_noodles: "Ramen / Noodle House",
            food_restaurant: "Restaurant",
            food_romanian: "Romanian Restaurant",
            food_russian: "Russian Restaurant",
            food_salad: "Salad Place",
            food_sandwiches: "Sandwich Place",
            food_scandinavian: "Scandinavian Restaurant",
            food_seafood: "Seafood Restaurant",
            food_snacks: "Snack Place",
            food_soup: "Soup Place",
            food_south_american: "South American Restaurant",
            food_southern_soul: "Southern / Soul Food Restaurant",
            food_souvlaki: "Souvlaki Shop",
            food_spanish: "Spanish Restaurant",
            food_steakhouse: "Steakhouse",
            food_sushi: "Sushi Restaurant",
            food_swiss: "Swiss Restaurant",
            food_tacos: "Taco Place",
            food_tapas: "Tapas Restaurant",
            food_tatar: "Tatar Restaurant",
            food_tea_room: "Tea Room",
            food_thai: "Thai Restaurant",
            food_tibetan: "Tibetan Restaurant",
            food_turkish: "Turkish Restaurant",
            food_ukrainian: "Ukrainian Restaurant",
            food_vegetarian_vegan: "Vegetarian / Vegan Restaurant",
            food_vietnamese: "Vietnamese Restaurant",
            food_winery: "Winery",
            food_wings: "Wings Joint"
          },
          "Nightlife Spot": {
            nightlife_spot_bar: "Bar",
            nightlife_spot_beach_bar: "Beach Bar",
            nightlife_spot_beer_garden: "Beer Garden",
            nightlife_spot_brewery: "Brewery",
            nightlife_spot_champagne_bar: "Champagne Bar",
            nightlife_spot_cocktail: "Cocktail Bar",
            nightlife_spot_dive_bar: "Dive Bar",
            nightlife_spot_gay_bar: "Gay Bar",
            nightlife_spot_hookah_bar: "Hookah Bar",
            nightlife_spot_hotel_bar: "Hotel Bar",
            nightlife_spot_karaoke: "Karaoke Bar",
            nightlife_spot_lounge: "Lounge",
            nightlife_spot_nightclub: "Nightclub",
            nightlife_spot_nightlife: "Other Nightlife",
            nightlife_spot_pub: "Pub",
            nightlife_spot_sake_bar: "Sake Bar",
            nightlife_spot_speakeasy: "Speakeasy",
            nightlife_spot_sports_bar: "Sports Bar",
            nightlife_spot_strip_club: "Strip Club",
            nightlife_spot_whisky_bar: "Whisky Bar",
            nightlife_spot_wine_bar: "Wine Bar"
          },
          "Outdoors & Recreation": {
            outdoors_recreation_athletics_sports: "Athletics & Sports",
            outdoors_recreation_bath_house: "Bath House",
            outdoors_recreation_bathing_area: "Bathing Area",
            outdoors_recreation_beach: "Beach",
            outdoors_recreation_botanical_garden: "Botanical Garden",
            outdoors_recreation_bridge: "Bridge",
            outdoors_recreation_campground: "Campground",
            outdoors_recreation_castle: "Castle",
            outdoors_recreation_cemetery: "Cemetery",
            outdoors_recreation_dive_spot: "Dive Spot",
            outdoors_recreation_dog_run: "Dog Run",
            outdoors_recreation_farm: "Farm",
            outdoors_recreation_field: "Field",
            outdoors_recreation_fishing_spot: "Fishing Spot",
            outdoors_recreation_forest: "Forest",
            outdoors_recreation_garden: "Garden",
            outdoors_recreation_gun_range: "Gun Range",
            outdoors_recreation_harbor_marina: "Harbor / Marina",
            outdoors_recreation_hot_spring: "Hot Spring",
            outdoors_recreation_island: "Island",
            outdoors_recreation_lake: "Lake",
            outdoors_recreation_lighthouse: "Lighthouse",
            outdoors_recreation_mountain: "Mountain",
            outdoors_recreation_national_park: "National Park",
            outdoors_recreation_other_outdoors: "Other Great Outdoors",
            outdoors_recreation_palace: "Palace",
            outdoors_recreation_park: "Park",
            outdoors_recreation_pedestrian_street_plaza: "Pedestrian Plaza",
            outdoors_recreation_playground: "Playground",
            outdoors_recreation_plaza: "Plaza",
            outdoors_recreation_pool: "Pool",
            outdoors_recreation_preserve: "Nature Preserve",
            outdoors_recreation_rafting: "Rafting",
            outdoors_recreation_recreation_center: "Recreation Center",
            outdoors_recreation_river: "River",
            outdoors_recreation_rock_climbing: "Rock Climbing Spot",
            outdoors_recreation_scenic_lookout: "Scenic Lookout",
            outdoors_recreation_sculpture: "Sculpture Garden",
            outdoors_recreation_ski_area: "Ski Area",
            outdoors_recreation_stables: "Stables",
            outdoors_recreation_states_municipalities: "States & Municipalities",
            outdoors_recreation_summer_camp: "Summer Camp",
            outdoors_recreation_trail: "Trail",
            outdoors_recreation_tree: "Tree",
            outdoors_recreation_vineyard: "Vineyard",
            outdoors_recreation_volcano: "Volcano",
            outdoors_recreation_well: "Well"
          },
          "Professional & Other Places": {
            professional_other_places_animal_shelter: "Animal Shelter",
            professional_other_places_auditorium: "Auditorium",
            professional_other_places_building: "Building",
            professional_other_places_club: "Club House",
            professional_other_places_community_center: "Community Center",
            professional_other_places_convention_center: "Convention Center",
            professional_other_places_cultural_center: "Cultural Center",
            professional_other_places_distributor: "Distribution Center",
            professional_other_places_event_space: "Event Space",
            professional_other_places_factory: "Factory",
            professional_other_places_fair: "Fair",
            professional_other_places_funeral_home: "Funeral Home",
            professional_other_places_government: "Government Building",
            professional_other_places_library: "Library",
            professional_other_places_medical: "Medical Center",
            professional_other_places_military_base: "Military Base",
            "professional_other_places_non-profit": "Non-Profit",
            professional_other_places_office: "Office",
            professional_other_places_parking: "Parking",
            professional_other_places_post_office: "Post Office",
            professional_other_places_prison: "Prison",
            professional_other_places_radio_station: "Radio Station",
            professional_other_places_recruiting_agency: "Recruiting Agency",
            professional_other_places_school: "School",
            professional_other_places_social_club: "Social Club",
            professional_other_places_spiritual: "Spiritual Center",
            professional_other_places_tv_station: "TV Station",
            professional_other_places_voting_booth: "Voting Booth",
            professional_other_places_warehouse: "Warehouse"
          },
          Residence: {
            residence_assisted_living: "Assisted Living",
            residence_home: "Home (private)",
            residence_housing_development: "Housing Development",
            residence_residential: "Residential Building (Apartment / Condo)",
            residence_trailer_park: "Trailer Park"
          },
          "Shop & Service": {
            shop_service_adult_boutique: "Adult Boutique",
            shop_service_antiques: "Antique Shop",
            shop_service_apparel: "Clothing Store",
            shop_service_arts_crafts: "Arts & Crafts Store",
            shop_service_astrologer: "Astrologer",
            shop_service_atm: "ATM",
            shop_service_auto_garage: "Auto Garage",
            shop_service_automotive: "Automotive Shop",
            shop_service_baby_store: "Baby Store",
            shop_service_bank: "Bank",
            shop_service_betting_shop: "Betting Shop",
            shop_service_big_box_store: "Big Box Store",
            shop_service_bike_shop: "Bike Shop",
            shop_service_board_shop: "Board Shop",
            shop_service_bookstore: "Bookstore",
            shop_service_bridal: "Bridal Shop",
            shop_service_camera_store: "Camera Store",
            shop_service_candy_store: "Candy Store",
            shop_service_car_dealer: "Car Dealership",
            shop_service_car_wash: "Car Wash",
            shop_service_carpet_store: "Carpet Store",
            shop_service_check_cashing_service: "Check Cashing Service",
            shop_service_chocolate_shop: "Chocolate Shop",
            shop_service_christmas_market: "Christmas Market",
            shop_service_comic_shop: "Comic Shop",
            shop_service_convenience_stores: "Convenience Store",
            shop_service_cosmetics: "Cosmetics Shop",
            shop_service_costume_shop: "Costume Shop",
            shop_service_credit_union: "Credit Union",
            shop_service_daycare: "Daycare",
            shop_service_department_store: "Department Store",
            shop_service_design: "Design Studio",
            shop_service_discount_store: "Discount Store",
            shop_service_dispensary: "Marijuana Dispensary",
            shop_service_dive_shop: "Dive Shop",
            shop_service_dry_cleaner: "Dry Cleaner",
            shop_service_electronics: "Electronics Store",
            shop_service_ev_charging: "EV Charging Station",
            shop_service_fabric_shop: "Fabric Shop",
            shop_service_financial_legal: "Financial or Legal Service",
            shop_service_fireworks_store: "Fireworks Store",
            shop_service_fishing_store: "Fishing Store",
            shop_service_flea_market: "Flea Market",
            shop_service_flower_shop: "Flower Shop",
            shop_service_food_drink: "Food & Drink Shop",
            shop_service_frame_store: "Frame Store",
            shop_service_fruit_vegetable_store: "Fruit & Vegetable Store",
            shop_service_furniture_home: "Furniture / Home Store",
            shop_service_gaming_cafe: "Gaming Cafe",
            shop_service_garden_center: "Garden Center",
            shop_service_gas_station_garage: "Gas Station / Garage",
            shop_service_gift_shop: "Gift Shop",
            shop_service_gun_shop: "Gun Shop",
            shop_service_gym_fitness: "Gym / Fitness Center",
            shop_service_hardware: "Hardware Store",
            shop_service_herbs_spices_store: "Herbs & Spices Store",
            shop_service_hobbies: "Hobby Shop",
            shop_service_hunting_supply: "Hunting Supply",
            shop_service_internet_cafe: "Internet Cafe",
            shop_service_it_services: "IT Services",
            shop_service_jewelry: "Jewelry Store",
            shop_service_knitting_supplies: "Knitting Store",
            shop_service_laundromat: "Laundromat",
            shop_service_laundry: "Laundry Service",
            shop_service_lawyer: "Lawyer",
            shop_service_leather_goods: "Leather Goods Store",
            shop_service_locksmith: "Locksmith",
            shop_service_lottery: "Lottery Retailer",
            shop_service_luggage_store: "Luggage Store",
            shop_service_mall: "Mall",
            shop_service_market: "Market",
            shop_service_massage_studio: "Massage Studio",
            shop_service_mattress_store: "Mattress Store",
            shop_service_mobile_phone: "Mobile Phone Shop",
            shop_service_motorcycle_shop: "Motorcycle Shop",
            shop_service_music_store: "Music Store",
            shop_service_nail_salon: "Nail Salon",
            shop_service_newsstand: "Newsstand",
            shop_service_office_supplies: "Paper / Office Supplies Store",
            shop_service_optical: "Optical Shop",
            shop_service_other_repair: "Other Repair Shop",
            shop_service_outdoor_supplies: "Outdoor Supply Store",
            shop_service_outlet_store: "Outlet Store",
            shop_service_pawn_shop: "Pawn Shop",
            shop_service_perfume_shop: "Perfume Shop",
            shop_service_pet_service: "Pet Service",
            shop_service_pet_store: "Pet Store",
            shop_service_pharmacy: "Drugstore / Pharmacy",
            shop_service_photography_lab: "Photography Lab",
            shop_service_piercing_parlor: "Piercing Parlor",
            "shop_service_pop-up_shop": "Pop-Up Shop",
            shop_service_print_shop: "Print Shop",
            shop_service_real_estate: "Real Estate Office",
            shop_service_record_shop: "Record Shop",
            shop_service_recording_studio: "Recording Studio",
            shop_service_recycling: "Recycling Facility",
            shop_service_salon_barbershop: "Salon / Barbershop",
            shop_service_shipping_store: "Shipping Store",
            shop_service_shoe_repair: "Shoe Repair",
            shop_service_shop: "Miscellaneous Shop",
            shop_service_smoke_shop: "Smoke Shop",
            shop_service_smoothie_shop: "Smoothie Shop",
            shop_service_souvenir_shop: "Souvenir Shop",
            shop_service_spa: "Spa",
            shop_service_sporting_goods: "Sporting Goods Shop",
            shop_service_stationery_store: "Stationery Store",
            shop_service_storage: "Storage Facility",
            shop_service_tailor: "Tailor Shop",
            shop_service_tanning_salon: "Tanning Salon",
            shop_service_tattoo: "Tattoo Parlor",
            shop_service_thrift_vintage: "Thrift / Vintage Store",
            shop_service_toys_games: "Toy / Game Store",
            shop_service_travel_agency: "Travel Agency",
            shop_service_used_bookstore: "Used Bookstore",
            shop_service_video_games: "Video Game Store",
            shop_service_video_store: "Video Store",
            shop_service_warehouse_store: "Warehouse Store",
            shop_service_watch_repair: "Watch Repair Shop"
          },
          "Travel & Transport": {
            travel_transport_airport: "Airport",
            travel_transport_bike: "Bike Rental / Bike Share",
            travel_transport_boat_ferry: "Boat or Ferry",
            travel_transport_border_crossing: "Border Crossing",
            travel_transport_bus_station: "Bus Station",
            travel_transport_bus_stop: "Bus Stop",
            travel_transport_cable_car: "Cable Car",
            travel_transport_hotel: "Hotel",
            travel_transport_intersection: "Intersection",
            travel_transport_light_rail: "Light Rail",
            travel_transport_lounge: "Travel Lounge",
            travel_transport_moving_target: "Moving Target",
            travel_transport_pier: "Pier",
            travel_transport_rental_car: "Rental Car Location",
            travel_transport_rest_areas: "Rest Area",
            travel_transport_road: "Road",
            travel_transport_rv_park: "RV Park",
            travel_transport_street: "Street",
            travel_transport_subway: "Subway",
            travel_transport_taxi: "Taxi",
            travel_transport_toll_booth: "Toll Booth",
            travel_transport_toll_plaza: "Toll Plaza",
            travel_transport_tourist_information: "Tourist Information Center",
            travel_transport_train_station: "Train Station",
            travel_transport_tram: "Tram",
            travel_transport_travel: "General Travel",
            travel_transport_tunnel: "Tunnel"
          }
        },
        opening_hours: "Opening hours",
        operators: {
          errors: {
            nonexistent_operator: "There are no operators with this %{field}."
          }
        },
        overview: {
          about_ship: "About",
          overview: "Overview",
          view_options: {
            view: "View",
            view_accommodation: "Accommodation",
            view_dining: "Dining",
            view_enrichment: "Enrichment",
            view_entertainment: "Entertainment",
            view_health_fitness: "Health & Fitness",
            view_kids_and_teens: "Kids & Teens"
          }
        },
        page_attributes_category: "Category",
        page_attributes_description: "*Description",
        page_attributes_email: "Email",
        page_attributes_facebook_url: "Facebook url",
        page_attributes_telephone: "*Telephone",
        page_attributes_ticketing_info: "Ticketing info",
        page_attributes_ticketing_url: "Ticketing url",
        page_attributes_title: "*Title",
        page_attributes_twitter_url: "Twitter url",
        page_attributes_video_url: "Video url",
        page_attributes_website_url: "Website url",
        page_categories: {
          Accommodation: {
            accommodation_bed_breakfast: "Bed & Breakfast",
            accommodation_campsite: "Campsite",
            accommodation_holiday_park: "Holiday Park",
            accommodation_holiday_resort: "Holiday Resort",
            accommodation_hostel: "Hostel",
            accommodation_hotel: "Hotel",
            accommodation_self_catering: "Self Catering",
            accommodation_serviced_apartment: "Serviced Apartment"
          },
          Attractions: {
            attractions_aquarium: "Aquarium",
            attractions_castle: "Castle",
            attractions_heritage_site: "Heritage Site",
            attractions_historic_monuments: "Historic Monuments",
            attractions_historic_site: "Historic Site",
            attractions_national_park: "National Park",
            attractions_palace: "Palace",
            attractions_theme_park: "Theme Park",
            attractions_visitor_attraction: "Visitor Attraction",
            attractions_water_park: "Water Park",
            attractions_zoo: "Zoo"
          },
          Education: {
            education_college: "College",
            education_nursery_preschool: "Nursery & Preschool",
            education_school: "School",
            education_student_centre: "Student Centre",
            education_university: "University"
          },
          Entertainment: {
            entertainment_cinema: "Cinema",
            entertainment_comedy_club: "Comedy Club",
            entertainment_event_space: "Event Space",
            entertainment_karaoke_bar: "Karaoke Bar",
            entertainment_museum: "Museum",
            entertainment_music_venue: "Music Venue",
            entertainment_performing_arts_venue: "Performing Arts Venue",
            entertainment_recreation_centre: "Recreation Centre",
            entertainment_stadium: "Stadium",
            entertainment_theatre: "Theatre"
          },
          Event: {
            event_carnival: "Carnival",
            event_christmas_market: "Christmas Market",
            event_circus: "Circus",
            event_conference: "Conference",
            event_convention: "Convention",
            event_fair: "Fair",
            event_farmers_market: "Farmers Market",
            event_festival: "Festival",
            event_fete: "Fete",
            event_market: "Market",
            event_music_festival: "Music Festival",
            event_street_fair: "Street Fair"
          },
          "Food & Drink": {
            food_drink_asian_restaurant: "Asian Restaurant",
            food_drink_bakery: "Bakery",
            food_drink_beer_garden: "Beer Garden",
            food_drink_brazilian_restaurant: "Brazilian Restaurant",
            food_drink_brewery: "Brewery",
            food_drink_buffet: "Buffet",
            food_drink_burger_joint: "Burger Joint",
            food_drink_cafe: "Caf\xe9",
            food_drink_cake_shop: "Cake Shop",
            food_drink_chinese_restaurant: "Chinese Restaurant",
            food_drink_cocktail_bar: "Cocktail Bar",
            food_drink_coffee_shop: "Coffee Shop",
            food_drink_creperie: "Creperie",
            food_drink_deli: "Deli",
            food_drink_dessert_shop: "Dessert Shop",
            food_drink_dim_sum_restaurant: "Dim Sum Restaurant",
            food_drink_diner: "Diner",
            food_drink_donut_shop: "Donut Shop",
            food_drink_fast_food_restaurant: "Fast Food Restaurant",
            food_drink_fish_chips_shop: "Fish & Chips Shop",
            food_drink_food_court: "Food Court",
            food_drink_french_restaurant: "French Restaurant",
            food_drink_greek_restaurant: "Greek Restaurant",
            food_drink_hot_dog_joint: "Hot Dog Joint",
            food_drink_ice_cream_shop: "Ice Cream Shop",
            food_drink_indian_restaurant: "Indian Restaurant",
            food_drink_italian_restaurant: "Italian Restaurant",
            food_drink_japanese_restaurant: "Japanese Restaurant",
            food_drink_juice_bar: "Juice Bar",
            food_drink_kosher_restaurant: "Kosher Restaurant",
            food_drink_mexican_restaurant: "Mexican Restaurant",
            food_drink_noodle_house: "Noodle House",
            food_drink_pie_shop: "Pie Shop",
            food_drink_pizza_place: "Pizza Place",
            food_drink_pubs_bars: "Pubs & Bars",
            food_drink_restaurant: "Restaurant",
            food_drink_sandwich_place: "Sandwich Place",
            food_drink_seafood_restaurant: "Seafood Restaurant",
            food_drink_spanish_restaurant: "Spanish Restaurant",
            food_drink_speciality_food: "Speciality Food",
            food_drink_sports_bar: "Sports Bar",
            food_drink_steakhouse: "Steakhouse",
            food_drink_sushi_restaurant: "Sushi Restaurant",
            food_drink_takeaway: "Takeaway",
            food_drink_tapas_restaurant: "Tapas Restaurant",
            food_drink_tea_room: "Tea Room",
            food_drink_wine_bar: "Wine Bar"
          },
          Health: {
            health_dentist: "Dentist",
            health_health_beauty: "Health & Beauty",
            health_hospital: "Hospital",
            health_medical_practice: "Medical Practice,",
            health_optician: "Optician",
            health_pharmacy: "Pharmacy"
          },
          Leisure: {
            leisure_arcade: "Arcade",
            leisure_art_gallery: "Art Gallery",
            leisure_beach: "Beach",
            leisure_boat_charters: "Boat Charters",
            leisure_botanical_garden: "Botanical Garden",
            leisure_bowling_alley: "Bowling Alley",
            leisure_bridge: "Bridge",
            leisure_casino: "Casino",
            leisure_community_centre: "Community Centre",
            leisure_country_park: "Country Park",
            leisure_farm: "Farm",
            leisure_forest: "Forest",
            leisure_garden: "Garden",
            leisure_go_karting: "Go Karting",
            leisure_golf_club: "Golf Club",
            leisure_gym_fitness_centre: "Gym / Fitness Centre",
            leisure_harbour_marina: "Harbour / Marina",
            leisure_lake: "Lake",
            leisure_laser_tag: "Laser Tag",
            leisure_library: "Library",
            leisure_lighthouse: "Lighthouse",
            leisure_mini_golf: "Mini Golf",
            leisure_nature_preserve: "Nature Reserve",
            leisure_nightclub: "Nightclub",
            leisure_park: "Park",
            leisure_pedestrian_plaza: "Pedestrian Plaza",
            leisure_playground: "Playground",
            leisure_racetrack: "Racetrack",
            leisure_rafting: "Rafting",
            leisure_riding_stable: "Riding Stable",
            leisure_river: "River",
            leisure_scenic_lookout: "Scenic Lookout",
            leisure_ski_snow_sports: "Ski / Snow Sports",
            leisure_social_club: "Social Club",
            leisure_spa: "Spa",
            leisure_swimming_pool: "Swimming Pool",
            leisure_tours: "Tours"
          },
          Religion: {
            religion_church: "Church",
            religion_mosque: "Mosque",
            religion_religious_organisation: "Religious Organisation",
            religion_synagogue: "Synagogue",
            religion_temple: "Temple"
          },
          Service: {
            service_bank: "Bank",
            service_beauty_salon: "Beauty Salon",
            service_car_wash: "Car Wash",
            service_cheque_cashing_service: "Cheque Cashing Service",
            service_garage_autocentre: "Garage & Autocentre",
            service_government_building: "Government Building",
            service_internet_cafe: "Internet Cafe",
            service_it_services: "IT Services",
            service_laundry_service: "Laundry Service",
            service_left_luggage: "Left Luggage",
            service_nail_salon: "Nail Salon",
            service_office: "Office",
            service_petrol_service_stations: "Petrol & Service Stations",
            service_post_office: "Post Office",
            service_shipping_service: "Shipping Service",
            service_shoe_repair: "Shoe Repair",
            service_storage_facility: "Storage Facility",
            service_tattooing_piercing: "Tattooing & Piercing"
          },
          Shopping: {
            shopping_arts_crafts_store: "Arts & Crafts Store",
            shopping_bike_shop: "Bike Shop",
            shopping_book_shop: "Book Shop",
            shopping_butchers: "Butchers",
            shopping_chocolate_shop: "Chocolate Shop",
            shopping_clothing_store: "Clothing Store",
            shopping_convenience_store: "Convenience Store",
            shopping_department_store: "Department Store",
            shopping_discount_store: "Discount Store",
            shopping_diy_hardware_supplies: "DIY & Hardware Supplies",
            shopping_electronics_store: "Electronics Store",
            shopping_fancy_dress: "Fancy Dress",
            shopping_furniture_shop: "Furniture Shop",
            shopping_garden_centre: "Garden Centre",
            shopping_gift_shop: "Gift Shop",
            shopping_gun_shop: "Gun Shop",
            shopping_hairdresser: "Hairdresser",
            shopping_health_food_shop: "Health Food Shop",
            shopping_hobby_shop: "Hobby Shop",
            shopping_jeweller: "Jeweller",
            shopping_lingerie_shop: "Lingerie Shop",
            shopping_luggage_shop: "Luggage Shop",
            shopping_mobile_phone_shop: "Mobile Phone Shop",
            shopping_music_dvds: "Music & DVDs",
            shopping_newsagent: "Newsagent",
            shopping_outlet_shop: "Outlet Shop",
            shopping_perfume_shop: "Perfume Shop",
            shopping_shoe_shop: "Shoe Shop",
            shopping_shopping_centre: "Shopping Centre",
            shopping_souvenir_shop: "Souvenir Shop",
            shopping_specialist_retailer: "Specialist Retailer",
            shopping_sportswear_equipment: "Sportswear & Equipment",
            shopping_stationers: "Stationers",
            shopping_sweet_shop: "Sweet Shop",
            shopping_technology: "Technology",
            shopping_tour_operator: "Tour Operator",
            shopping_toys_games: "Toys & Games",
            shopping_travel_agent: "Travel Agent"
          },
          Travel: {
            travel_airport: "Airport",
            travel_boat_or_ferry: "Boat or Ferry",
            travel_bus_station: "Bus Station",
            travel_car_park: "Car Park",
            travel_car_rental: "Car Rental",
            travel_coach_station: "Coach Station",
            travel_cruise_port: "Cruise Port",
            travel_cruise_terminal: "Cruise Terminal",
            travel_parking: "Parking",
            travel_taxi: "Taxi",
            travel_train_station: "Train Station",
            travel_tram: "Tram",
            travel_underground: "Underground",
            travel_visitor_information_centre: "Visitor Information Centre"
          }
        },
        please_wait_html: "Please wait&hellip;",
        policy: {
          cookie: "Cookie Policy",
          privacy_policy: "Privacy Policy",
          terms_and_conditions: "T&Cs"
        },
        ports: {
          errors: {
            nonexistent_port: "There are no ports with this %{field}."
          }
        },
        postcode: "Postcode",
        preview: "Preview",
        price_pp: "Price pp",
        price_range_per_person: "Price range (per person)",
        publish_at_date: "*Publish Date",
        publish_at_time: "*Publish Time",
        publish_at_without_zone: "*Publish at",
        pundit: {
          custom_error: "You do not currently have the permissions to access this content.",
          default_error: "You cannot perform this action.",
          defaults: {
            "create?": "You cannot create a %{name}!",
            "destroy?": "You cannot delete this %{name}!",
            "edit?": "You cannot edit this %{name}!",
            "index?": "You cannot list %{name}!",
            "new?": "You cannot create a %{name}!",
            "operator?": "You do not have permission to perform this action",
            "place?": "You do not have permission to perform this action",
            "show?": "You cannot view this %{name}!",
            "sign_in_as?": "You do not have permission to perform this action",
            "update?": "You cannot update this %{name}!"
          }
        },
        ransack: {
          all: "all",
          and: "and",
          any: "any",
          asc: "ascending",
          attribute: "attribute",
          combinator: "combinator",
          condition: "condition",
          desc: "descending",
          or: "or",
          predicate: "predicate",
          predicates: {
            blank: "is blank",
            cont: "contains",
            cont_all: "contains all",
            cont_any: "contains any",
            does_not_match: "doesn't match",
            does_not_match_all: "doesn't match all",
            does_not_match_any: "doesn't match any",
            end: "ends with",
            end_all: "ends with all",
            end_any: "ends with any",
            eq: "equals",
            eq_all: "equals all",
            eq_any: "equals any",
            "false": "is false",
            gt: "greater than",
            gt_all: "greater than all",
            gt_any: "greater than any",
            gteq: "greater than or equal to",
            gteq_all: "greater than or equal to all",
            gteq_any: "greater than or equal to any",
            "in": "in",
            in_all: "in all",
            in_any: "in any",
            lt: "less than",
            lt_all: "less than all",
            lt_any: "less than any",
            lteq: "less than or equal to",
            lteq_all: "less than or equal to all",
            lteq_any: "less than or equal to any",
            matches: "matches",
            matches_all: "matches all",
            matches_any: "matches any",
            not_cont: "doesn't contain",
            not_cont_all: "doesn't contain all",
            not_cont_any: "doesn't contain any",
            not_end: "doesn't end with",
            not_end_all: "doesn't end with all",
            not_end_any: "doesn't end with any",
            not_eq: "not equal to",
            not_eq_all: "not equal to all",
            not_eq_any: "not equal to any",
            not_in: "not in",
            not_in_all: "not in all",
            not_in_any: "not in any",
            not_null: "is not null",
            not_start: "doesn't start with",
            not_start_all: "doesn't start with all",
            not_start_any: "doesn't start with any",
            "null": "is null",
            present: "is present",
            start: "starts with",
            start_all: "starts with all",
            start_any: "starts with any",
            "true": "is true"
          },
          search: "search",
          sort: "sort",
          value: "value"
        },
        read_less: "Read less",
        read_more: "Read more",
        recaptcha_expired: "reCAPTCHA expired",
        reconfirmation_pending_html: "<strong>Note:</strong> The updated title for this %{name} has not yet been verified!",
        region_attributes_area: "City or National Park",
        region_attributes_country: "*Country",
        region_attributes_county: "County",
        region_attributes_district: "District",
        region_attributes_state: "*State",
        required_market_filter: "Market filter is required",
        river: "River",
        search: "Search",
        search_placeholder_html: "Search&hellip;",
        search_results: "Search Results",
        select_blank: "- select %{name} -",
        select_cruise_date: "Select Cruise Date",
        select_cruise_length: "Select Cruise Length",
        ship: {
          adults_only_options: {
            adults_only: "Adult only",
            itinerary_dependent: "Children welcome on select itineraries",
            kids_allowed: "Family friendly",
            no_kids: "Children not advised"
          },
          currency_options: {
            AUS: "Australian Dollar ($)",
            CNY: "Chinese Yuan (\xa5)",
            EUR: "Euro (\u20ac)",
            GBP: "Pound Sterling (\xa3)",
            JPY: "Japanese Yen (\xa5)",
            NOK: "Norwegian Krone (kr)",
            USD: "US Dollar ($)"
          },
          dining_experience_options: {
            complimentary: "Complimentary",
            cover: "Cover charge may apply",
            snacks: "Snacks/ light bites"
          },
          dining_food_type_options: {
            american: "American",
            asian: "Asian",
            bakery: "Bakery",
            bbq: "BBQ & Grill",
            british: "British",
            brunch: "Brunch",
            buffet: "Buffet",
            cafe: "Cafe",
            caribbean: "Caribbean",
            casual: "Casual",
            chef: "Chef's Table",
            classic: "Classic",
            continental: "Continental",
            fast: "Fast Food",
            fine: "Fine Dining",
            french: "French",
            fusion: "Fusion",
            gastro: "Gastro Pub",
            gelato: "Gelato",
            gourmet: "Gourmet",
            healthy: "Healthy Option",
            ice_cream: "Ice Cream Parlour",
            indian: "Indian",
            international: "International",
            italian: "Italian",
            japanese: "Japanese",
            mexican: "Mexican",
            new_orleans: "New Orleans",
            pacific: "Pacific Rim",
            pizzeria: "Pizzeria",
            regional: "Regionally Inspired",
            room: "Room Service",
            seafood: "Seafood",
            south_american: "South American",
            spanish: "Spanish",
            steakhouse: "Steakhouse",
            surf_turf: "Steak & Seafood",
            sushi: "Sushi",
            tapas: "Tapas",
            themed: "Themed",
            varies: "Varies",
            wine: "Wine & Dine"
          },
          kids_facilities_options: {
            available: "Children's facilities available",
            itinerary_dependent: "Children\u2019s facilities available on select itineraries",
            none: "Children's facilities not available"
          },
          nursery_options: {
            babysitting: "Babysitting available",
            cabin_and_nursery: "Nursery available in cabin and nursery",
            in_cabin_only: "Nursery available in cabin only",
            none: " Nursery not available",
            nursery: "Nursery available"
          },
          select_ships: "Select Ships",
          ship: "Ship",
          smoking_options: {
            balcony: "Smoking on balconies only",
            balcony_cabins: "Smoking allowed on balconies, cabins & designated areas",
            cabins_designated: "Smoking allowed in select cabins & designated areas only",
            "e-cig": "E-cigarettes only",
            none: "Smoke-free ship",
            smoking_permitted: "Smoking allowed",
            some: "Smoking in designated areas only"
          }
        },
        ship_adults_only_options: {
          adults_only: "Adult only",
          itinerary_dependent: "Children welcome on select itineraries",
          kids_allowed: "Family friendly",
          no_kids: "Children not advised"
        },
        ship_kids_facilities_options: {
          available: "Children's facilities available",
          itinerary_dependent: "Children\u2019s facilities available on select itineraries",
          none: "Children's facilities not available"
        },
        ship_nursery_options: {
          babysitting: "Babysitting available",
          cabin_and_nursery: "Nursery available in cabin and nursery",
          in_cabin_only: "Nursery available in cabin only",
          none: " Nursery not available",
          nursery: "Nursery available"
        },
        ship_smoking_options: {
          balcony: "Smoking on balconies only",
          balcony_cabins: "Smoking allowed on balconies, cabins & designated areas",
          cabins_designated: "Smoking allowed in select cabins & designated areas only",
          "e-cig": "E-cigarettes only",
          none: "Smoke-free ship",
          smoking_permitted: "Smoking allowed",
          some: "Smoking in designated areas only"
        },
        ship_type_options: {
          ferry: "Ferry",
          ocean: "Ocean",
          river: "River"
        },
        ships: {
          ship_not_found: "Ship not found"
        },
        show: "View",
        show_model: "View %{name}",
        show_results: "Show Results",
        simple_form: {
          error_notification: {
            default_message: "Please review the problems below:"
          },
          hints: {
            defaults: {
              video_url: "copy a link from Youtube or Vimeo"
            }
          },
          include_blanks: {
            select_map_style: {
              mapbox_style: "Select Map Style"
            },
            select_theme: {
              theme: "Select Theme"
            },
            team_owners: {
              user_id: "Select Owner"
            },
            widgets_events_list: {
              mapbox_style: "Select Map Style",
              theme: "Select Theme"
            },
            widgets_meet_the_fleets: {
              mapbox_style: "Select Map Style",
              theme: "Select Theme"
            },
            widgets_places_list: {
              mapbox_style: "Select Map Style",
              theme: "Select Theme"
            },
            widgets_promotions_list: {
              mapbox_style: "Select Map Style",
              theme: "Select Theme"
            }
          },
          labels: {
            defaults: {
              tag_list: "List of tags",
              video_url: "Video (YouTube)"
            },
            place: {
              area_id: "City / Village / National Park"
            },
            region: {
              level: "Level",
              name: "Name"
            },
            user: {
              interests: "Interested in"
            },
            widgets_events_list: {
              theme: {
                hide_file_types: "Show filter by Type of file",
                hide_quick_filters: "Include Quick Filters",
                hide_search: "Include Search"
              }
            },
            widgets_places_list: {
              theme: {
                hide_file_types: "Show filter by Type of file",
                hide_quick_filters: "Include Quick Filters",
                hide_search: "Include Search"
              }
            },
            widgets_promotions_list: {
              theme: {
                hide_file_types: "Show filter by Type of file",
                hide_quick_filters: "Include Quick Filters",
                hide_search: "Include Search"
              }
            },
            widgets_theme: {
              title: "Give your theme a name"
            },
            widgets_widget: {
              theme: {
                hide_file_types: "Show filter by Type of file",
                hide_quick_filters: "Include Quick Filters",
                hide_search: "Include Search"
              }
            }
          },
          no: "No",
          placeholders: {
            attachment: {
              scope: 'Enter scope (e.g. "main")'
            },
            defaults: {
              description: "Describe your page\u2026",
              email: "Email address",
              facebook_url: "http://www.facebook.com/example",
              introduction: "Enter an introduction\u2026",
              latitude: "Latitude",
              longitude: "Longitude",
              tag_list: "Enter tags separated by commas (e.g. Cruise, Restaurant, Family)",
              teaser: "Enter teaser text\u2026",
              telephone: "Telephone",
              ticketing_info: "Enter ticketing information\u2026",
              ticketing_url: "http://www.tickets-example.com/example",
              title: "Enter a title",
              twitter_url: "http://www.twitter.com/example",
              video_url: "http://youtu.be/abcdef",
              website_url: "http://www.example.com"
            },
            event: {
              page: {
                ticketing_url: "http://www.tickets-example.com/event-tickets",
                title: "Enter the event title"
              }
            },
            place: {
              business_telephone: "Main business telephone number",
              county_state: "County or State",
              page: {
                description: "Describe your place\u2026",
                email: "Business or place email address",
                telephone: "Business or place telephone",
                title: "A business name or place name"
              },
              postcode: "Postcode or Zipcode",
              street_address: "Place name or street address",
              town_city: "Town or City"
            },
            promotion: {
              page: {
                ticketing_url: "http://www.tickets-example.com/promotion-tickets",
                title: "Enter the promotion title"
              }
            },
            ship: {
              celebrity_ties: "Enter Celebrities which are tied in...",
              gratuities: "Describe the gratuities procedure",
              introduction: "Introduce and describe the ship\u2026",
              page: {
                title: "Ship name"
              },
              ship_class: "Ship class",
              teaser: "Enter teaser text for the ship\u2026",
              unique_feature: "Enter unique feature text"
            },
            user: {
              current_password: "Your current password",
              edit: {
                email: "Your new email address",
                password: "Your new password",
                password_confirmation: "\u2026 and again please"
              },
              email: "Your email address",
              full_name: "Your full name",
              password: "Password",
              password_confirmation: "\u2026 and again please"
            },
            widgets_brochure_rack: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                border_thickness_count: "Thickness",
                header_text: "Header",
                items_per_row_count: "Brochures per shelf",
                max_groups_per_page_count: "Shelves per page",
                search_box_placeholder_text: "Search placeholder"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_events_list: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_places_list: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_promotions_list: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_ship_iframe: {
              expected_width: "Expected Width",
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            },
            widgets_widget: {
              height: "Height",
              limit: "Maximum number of items",
              theme: {
                background_colour: "Background"
              },
              title: "Widget name",
              width: "Width"
            }
          },
          prompts: {
            widgets_events_list: {
              sort_by: "Sort By"
            },
            widgets_places_list: {
              sort_by: "Sort By"
            },
            widgets_promotions_list: {
              sort_by: "Sort By"
            }
          },
          required: {
            html: '<abbr data-tooltip class="tip-left" title="required">*</abbr>',
            mark: "*",
            text: "required"
          },
          yes: "Yes"
        },
        site_name: "Widgety",
        smoking: "Smoking",
        sorry_the_requested_cruise_is_no_longer_available: "Sorry, the requested cruise is no longer available",
        source: "Source",
        start_at_date: "*Start Date",
        start_at_time: "*Start Time",
        start_at_without_zone: "*Start at",
        street_address: "*Street address",
        successfully_created: "Successfully Created",
        suite: "Suite",
        support: {
          array: {
            last_word_connector: ", and ",
            two_words_connector: " and ",
            words_connector: ", "
          }
        },
        terms_app: {
          categories: {
            index: {
              table: {
                name: "Name",
                show: "Show",
                terms: "Terms"
              },
              title: "Policies"
            },
            show: {
              "new": "New Term",
              table: {
                content: "Content",
                id: "Id",
                show: "Show",
                state: "State",
                updated_at: "Updated at"
              },
              title: "%{name} Policy"
            }
          },
          mails: {
            admin: {
              subject: "User %{email} sent a portability request"
            },
            completed: {
              subject: "Your data is available"
            },
            progress: {
              subject: "Your data is being handled"
            }
          },
          menu: {
            policies: "Policies",
            portability_requests: "Portability requests",
            user_pending_policies: "My pending policies",
            user_portability_requests: "My Portability requests"
          },
          misc: {
            are_you_sure: "Are you sure?",
            back: "Back",
            download: "Download",
            edit: "Edit",
            save: "Save",
            show: "Show"
          },
          portability_requests: {
            index: {
              destroyed: "Successfully deleted",
              empty: "There is no requests",
              states: {
                completed: "Completed",
                pending: "Pending",
                progress: "In Progress"
              },
              table: {
                confirm: "Confirm",
                created_at: "Created at",
                destroy: "Delete",
                state: "State",
                user: "User"
              },
              title: "Pending requests"
            }
          },
          sign_out: "Logout",
          states: {
            draft: "Draft",
            published: "Published"
          },
          sub_title: "PolicyManager",
          terms: {
            edit: {
              description: "Description",
              error: "saving term",
              state: "State",
              title: "Edit %{name} term"
            },
            index: {
              button: "New Term",
              table: {
                category: "Policy",
                description: "Description",
                destroy: "Delete",
                edit: "Edit",
                show: "Show",
                updated_at: "Updated at"
              },
              title: "Terms"
            },
            "new": {
              button: "Button",
              created: "Successfully created",
              description: "Description",
              destroyed: "Successfully deleted",
              error: "error saving term",
              state: "State",
              title: "%{name} new term",
              updated: "Successfully updated"
            },
            show: {
              last_update: "Last update",
              table: {
                name: "Name",
                show: "Show",
                terms: "Terms"
              },
              title: "Term"
            }
          },
          title: "PolicyManager",
          user_portability_requests: {
            index: {
              button: "New portability request",
              created: "Information Request Submitted!",
              empty: "There are no portability requests",
              has_pending: "You have one pending information request, you can't create another one yet.",
              states: {
                completed: "Completed",
                pending: "Pending",
                progress: "In progress"
              },
              table: {
                created_at: "Created at",
                destroy: "Delete",
                file: "File",
                state: "State"
              },
              title: "My portability requests"
            }
          },
          user_terms: {
            pending: {
              empty: "There are no pending policies",
              title: "My pending policies"
            },
            show: {
              accepted: {
                message: "Accepted policy",
                not_now: "No not now",
                question: "Change your mind?",
                reject: "Reject"
              },
              pending: {
                agree: "Accept",
                message: "Please accept this policy",
                not_now: "No not now"
              }
            }
          }
        },
        thank_you_for_your_enquiry: "Thank you for your enquiry, one of our agents will contact you at the requested time.",
        time: {
          am: "am",
          formats: {
            "default": "%a, %d %b %Y %H:%M:%S %z",
            devise: {
              mailer: {
                invitation_instructions: {
                  accept_until_format: "%B %d, %Y %I:%M %p"
                }
              }
            },
            extra: "%d %B, %Y %H:%M:%S %Z",
            "long": "%d %B %Y %H:%M",
            "short": "%d %b %H:%M",
            w3c: "%Y-%m-%dT%H:%M%:z"
          },
          pm: "pm"
        },
        to: "to",
        uk_departures: "UK Departures",
        uk_ireland_departures: "UK & Ireland Departures",
        unfollow: "Unfollow",
        update: "Save changes",
        update_success: "%{name} was successfully updated",
        update_widget_code: "Update embed code",
        useful_to_know: "Useful to Know",
        user_terms: {
          show: {
            accept: "I agree the %{policy_name}",
            reject: "I do not agree, please delete my account"
          }
        },
        users: {
          errors: {
            invalid_id: {
              role: "One or more roles not found",
              team: "One or more teams not found"
            }
          }
        },
        validates_timeliness: {
          error_value_formats: {
            date: "%Y-%m-%d",
            datetime: "%Y-%m-%d %H:%M:%S",
            time: "%H:%M:%S"
          }
        },
        validations_failed: "Validations failed",
        view: "View",
        view_itineraries: "View Itineraries",
        view_itinerary: "View Itinerary",
        view_model: "View %{name}",
        view_or_amend_search: "View or Amend Search",
        view_ship: "View Ship",
        views: {
          pagination: {
            first: "&laquo; First",
            last: "Last &raquo;",
            next: "Next &rsaquo;",
            previous: "&lsaquo; Prev",
            truncate: "&hellip;"
          }
        },
        welcome: {
          dashboard: {
            no_team_message: "You do not currently have a team. Please contact your account manager to get access to Widgety."
          },
          pageable_panel: {
            list_style_class: {
              Event: "Event",
              Operator: "Operator",
              Place: "Place",
              Promotion: "Promo",
              Ship: "Ship"
            }
          }
        },
        widget_types: {
          brochure_rack: "Brochure Rack",
          cruise_tour_search: "Cruise & Tour Search",
          events_list: "Events List",
          meet_the_fleet: "Cruise Search",
          pageable: "Page",
          places_list: "Places List",
          promotions_list: "Promotions List",
          search: "Search",
          ship_iframe: "Ship iFrame",
          widget: "No type"
        },
        widgets: {
          widgets: {
            edit: {
              step_title: {
                completed: "Widget Creation is completed",
                content: "Choose your content",
                customization: "Customize your Widget",
                layout: "Choose your layout",
                owner: "Select an Owner for your Widget",
                preview: "Preview your Widget",
                ship_content: "Select a ship",
                title: "Name your Widget",
                type: "What type of Widget would you like to create?"
              },
              title: "Create my Widget"
            },
            steps: {
              customization: {
                expected_width_tooltip: "By providing the expected width of the Widget after embed, we can provide you with optimised images which will make the iFrame load faster."
              },
              layout: {
                choose_me: "Choose Me",
                coming_soon: "Coming Soon",
                designs: {
                  collapsed: "Collapsed",
                  "default": "Default",
                  grid: "Grid",
                  list: "List",
                  old: "Old"
                }
              },
              type: {
                cruise_brochures: "Cruise Brochures",
                cruise_trade_news: "Cruise Trade News",
                cruise_trade_promotions: "Cruise Trade Promotions",
                map_and_guide: "Map & Guide",
                meet_the_fleet: "Meet The Fleet",
                my_brochures: "My Brochures",
                my_events: "My Events",
                my_promotions: "My Promotions",
                ship_iframe: "Ship iFrame",
                ship_visits: "Ship Visits",
                virtual_tic: "Virtual TIC",
                whats_on_guide: "What's on Guide"
              }
            }
          }
        },
        will_paginate: {
          container_aria_label: "Pagination",
          next_aria_label: "Next page",
          next_label: "&gt;",
          page_aria_label: "Page %{page}",
          page_entries_info: {
            multi_page: "Displaying %{model} %{from} - %{to} of %{count} in total",
            multi_page_html: "Displaying %{model} <b>%{from}&nbsp;-&nbsp;%{to}</b> of <b>%{count}</b> in total",
            single_page: {
              one: "Displaying 1 %{model}",
              other: "Displaying all %{count} %{model}",
              zero: "No %{model} found"
            },
            single_page_html: {
              one: "Displaying <b>1</b> %{model}",
              other: "Displaying <b>all&nbsp;%{count}</b> %{model}",
              zero: "No %{model} found"
            }
          },
          page_gap: "&hellip;",
          previous_aria_label: "Previous page",
          previous_label: "&lt;"
        },
        your_cruise_preferences: "Your Cruise Preferences",
        your_details: "Your Details"
      }
    }
  });
//<!-- <script charset="UTF-8" src="https://www.widgety.co.uk/assets/widget_app/designs/cruise_tour_search/default/main-4b459a0ec6595a2c500d12eed1722ae48b588f1fef7d04eedc535e180718bebf.js"></scr ipt> -->
  window.onerror = window.onError
</script>
<style data-styled="active" data-styled-version="5.3.6"></style>
<style>
  <style type="text/css">
  .tk-futura-pt{font-family:"futura-pt",sans-serif;}
  @font-face{font-family:futura-pt;src:url(https://use.typekit.net/af/ba21ef/00000000000000000001008f/23/l?subset_id=2&fvd=n5&v=3) format("woff2"),url(https://use.typekit.net/af/ba21ef/00000000000000000001008f/23/d?subset_id=2&fvd=n5&v=3) format("woff"),url(https://use.typekit.net/af/ba21ef/00000000000000000001008f/23/a?subset_id=2&fvd=n5&v=3) format("opentype");font-weight:500;font-style:normal;font-stretch:normal;font-display:auto;}@font-face{font-family:futura-pt;src:url(https://use.typekit.net/af/2348e6/000000000000000000010091/23/l?subset_id=2&fvd=n7&v=3) format("woff2"),url(https://use.typekit.net/af/2348e6/000000000000000000010091/23/d?subset_id=2&fvd=n7&v=3) format("woff"),url(https://use.typekit.net/af/2348e6/000000000000000000010091/23/a?subset_id=2&fvd=n7&v=3) format("opentype");font-weight:700;font-style:normal;font-stretch:normal;font-display:auto;}
  .cRGlLO { display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; width: 100%; height: 100vh; opacity: 0.8; background: rgb(233, 235, 238); }
  .eZlyNQ { width: 200px; height: 50px; }
  .dwxbJC { width: 100%; height: 595px; object-fit: cover; }
  @media (max-width: 430px) {
    .dwxbJC { height: 288px; }
  }
  @media (max-width: 430px) {
    .hFslDp { width: 25px; height: 50px; }
  }
  .kumTYL { width: 45px; height: 100%; cursor: pointer; margin-right: 40px; }
  @media (max-width: 430px) {
    .kumTYL { display: flex; -webkit-box-pack: end; justify-content: flex-end; margin-right: 15px; }
  }
  .dbBakG { width: 45px; height: 100%; cursor: pointer; margin-left: 40px; }
  @media (max-width: 430px) {
    .dbBakG { display: flex; -webkit-box-pack: start; justify-content: flex-start; margin-left: 15px; }
  }
  .bBUkuH { position: relative; }
  .fBuZIe { position: absolute; display: flex; top: 14px; right: 23px; max-width: 70%; height: 23px; background: rgba(217, 217, 217, 0.5); padding: 0px 8px; font-size: 16px; opacity: 0.5; border-radius: 5px; }
  @media (max-width: 767px) {
    .fBuZIe { display: none; }
  }
  .kEyGgv { display: flex; width: 100%; }
  .jCaOza { display: flex; flex-direction: column; width: 100%; gap: 25px; padding: 28px 40px; }
  @media (max-width: 768px) {
    .jCaOza { padding: 25px 20px; }
  }
  .dGhXuI { font-weight: 700; font-size: 30px; text-transform: uppercase; color: rgb(19, 57, 77); }
  @media (max-width: 768px) {
    .dGhXuI { font-size: 15px; }
  }
  .dcPJRt { display: flex; flex-direction: column; width: 100%; font-size: 16px; gap: 10px; }
  @media (min-width: 1100px) {
    .dcPJRt { }
  }
  .fIXYGM { display: flex; gap: 50px; color: rgb(82, 82, 82); }
  @media (max-width: 430px) {
    .fIXYGM { gap: 10px; }
  }
  .hUOSlt { min-width: 125px; font-weight: 600; font-size: 14px; }
  @media (max-width: 768px) {
    .hUOSlt { font-size: 12px; min-width: 100px; }
  }
  .czucif { font-weight: 400; font-size: 14px; }
  @media (max-width: 768px) {
    .czucif { font-size: 12px; }
  }
  .flCNsD { display: flex; margin-top: 10px; cursor: pointer; }
  .gQdXgq { display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; width: 200px; height: 54px; background: rgb(188, 255, 238); border-radius: 10px; color: rgb(255, 255, 255); text-transform: uppercase; font-weight: 700; font-size: 16px; }
  @media (max-width: 430px) {
    .gQdXgq { font-size: 15px; }
  }
  .hLAFjB { display: flex; flex-direction: column; -webkit-box-align: center; align-items: center; width: 100%; padding: 10px 20px; gap: 30px; }
  @media (max-width: 430px) {
    .hLAFjB { gap: 10px; }
  }
  .jFXKVz { width: 363px; max-width: 969px; max-height: 100px; overflow: hidden; font-weight: 700; font-size: 24px; text-transform: uppercase; text-align: center; }
  @media (max-width: 1200px) {
    .jFXKVz { font-size: 18px; }
  }
  @media (max-width: 430px) {
    .jFXKVz { max-width: 250px; max-height: 100px; font-size: 15px; overflow: hidden; }
  }
  .jiBGIS { height: 100px; max-width: 225px; object-fit: contain; }
  .eyPUBV { font-weight: 700; font-size: 24px; text-transform: uppercase; }
  @media (max-width: 1200px) {
    .eyPUBV { font-size: 18px; }
  }
  @media (max-width: 430px) {
    .eyPUBV { font-size: 15px; }
  }
  .fhpewI { display: flex; width: 100%; flex-direction: column; background: rgb(246, 246, 246); }
  .gEjDRZ { position: relative; display: flex; flex-direction: column; max-height: 595px; }
  .LoLAv { position: absolute; display: flex; top: 20%; left: 12%; min-width: 363px; max-width: 969px; min-height: 264px; background: rgba(243, 240, 240, 0.5); border-radius: 5px; }
  @media (max-width: 1024px) {
    .LoLAv { max-width: 700px; left: 16%; }
  }
  @media (max-width: 820px) {
    .LoLAv { max-width: 550px; left: 16%; }
  }
  @media (max-width: 768px) {
    .LoLAv { max-width: 550px; left: 50%; transform: translate(-50%, 0px); }
  }
  @media (max-width: 430px) {
    .LoLAv { min-width: 280px; min-height: 150px; top: 6%; }
  }
  @media (max-width: 400px) {
    .LoLAv { min-width: 220px; min-height: 150px; top: 6%; }
  }
  .dSBxmm { position: absolute; display: flex; width: 358px; height: 491px; right: 7%; top: 82%; z-index: 1; }
  @media (max-width: 1100px) {
    .dSBxmm { display: none; }
  }
  .cWnQIS { -webkit-box-pack: center; justify-content: center; display: flex; width: 100%; }
  .NdgjS { position: relative; display: flex; bottom: 63px; width: 93%; background: rgb(255, 255, 255); border-top-left-radius: 5px; border-top-right-radius: 5px; padding: 20px; margin-bottom: 0px; }
  .NdgjS::after { content: ""; position: absolute; bottom: -20px; left: 0px; width: 100%; height: 20px; background: rgb(255, 255, 255); clip-path: polygon(50% 100%, 0px 0px, 100% 0px); }
  @media (max-width: 768px) {
    .NdgjS { bottom: 45px; width: 100%; margin: 0px 15px 150px; }
  }
  .bVcRJa { display: flex; -webkit-box-pack: center; justify-content: center; width: 100%; background: rgb(255, 255, 255); }
  .ewMRUd { display: flex; width: 80%; padding: 50px 0px 0px; }
  @media (max-width: 430px) {
    .ewMRUd { width: 100%; }
  }
  .inEqGE { position: fixed; width: 100vw; height: 100vh; z-index: 1; }
  .cNPHFD { display: none; -webkit-box-align: center; align-items: center; width: 100%; height: 48px; background: rgb(255, 255, 255); padding: 0px 30px; gap: 10px; cursor: pointer; color: rgb(0, 0, 0); }
  .hxGzlr { font-weight: 700; text-transform: uppercase; }
  .eCSWnu { gap: 50px; display: flex; -webkit-box-pack: center; justify-content: center; margin: 50px 0px; }
  @media (max-width: 550px) {
    .eCSWnu { flex-direction: column; gap: 20px; -webkit-box-align: center; align-items: center; }
  }
  .hQklkn { display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; width: 200px; height: 54px; background: rgb(188, 255, 238); border-radius: 10px; color: rgb(255, 255, 255); text-transform: uppercase; font-weight: 700; cursor: pointer; border: none; font-size: 16px; }
  @media (max-width: 430px) {
    .hQklkn { font-size: 15px; }
  }
  .nfiQn { display: flex; flex-direction: column; width: 100%; height: auto; }
  .cSvapm { display: flex; -webkit-box-pack: justify; justify-content: space-between; -webkit-box-align: center; align-items: center; width: 100%; height: 64px; background: rgb(242, 242, 243); border-radius: 5px 5px 0px 0px; }
  .hOsDTL { display: flex; font-weight: 700; font-size: 16px; margin-left: 20px; color: rgb(77, 79, 104); }
  @media (max-width: 430px) {
    .hOsDTL { font-size: 14px; }
  }
  .bwVifS { width: 24px; height: 24px; cursor: pointer; margin-right: 20px; }
  .bGiJNR { display: flex; flex-direction: column; width: 100%; border: 1px solid rgb(232, 232, 232); border-radius: 0px 0px 5px 5px; box-sizing: border-box; padding: 32px; }
  .ejOzAG { width: 100%; margin-top: 21px; color: rgb(82, 82, 82); }
  @media (max-width: 430px) {
    .ejOzAG { width: 340px; overflow-y: auto; }
  }
  @media (max-width: 400px) {
    .ejOzAG { width: 305px; overflow-y: auto; }
  }
  .laAjvC { width: 100%; height: auto; }
  @media (max-width: 430px) {
    .laAjvC { width: 550px; }
  }
  .cajTJU { display: flex; border-bottom: 1px solid rgb(148, 150, 168); padding-bottom: 15px; margin-bottom: 15px; }
  @media (max-width: 430px) {
    .cajTJU { font-size: 12px; }
  }
  .kAJxZC { width: 40%; }
  @media (max-width: 430px) {
    .kAJxZC { width: 25%; }
  }
  .kBGZjQ { width: 20%; }
  @media (max-width: 430px) {
    .kBGZjQ { width: 25%; }
  }
  .jvHgnz { width: 40%; font-weight: 700; font-size: 16px; }
  @media (max-width: 430px) {
    .jvHgnz { width: 25%; font-size: 12px; }
  }
  .jvppdp { width: 20%; font-weight: 700; font-size: 16px; }
  @media (max-width: 430px) {
    .jvppdp { width: 25%; font-size: 12px; }
  }
  .eMiCPU { display: flex; margin-bottom: 21px; }
  .grcpVJ { box-sizing: border-box; display: flex; flex-direction: column; width: 100%; margin-bottom: 20px; }
  .fjZJjG { display: flex; -webkit-box-pack: justify; justify-content: space-between; width: 100%; height: auto; -webkit-box-align: center; align-items: center; }
  @media (max-width: 800px) {
  }
  .igeDkR { display: flex; font-weight: 700; font-size: 30px; text-transform: uppercase; color: rgb(19, 57, 77); }
  @media (max-width: 550px) {
    .igeDkR { font-size: 15px; margin-left: 15px; }
  }
  .iaoKLf { display: flex; font-weight: 700; font-size: 30px; text-transform: uppercase; color: rgb(0, 153, 119); position: absolute; left: 50%; transform: translateX(-50%); }
  @media (max-width: 550px) {
    .iaoKLf { font-size: 15px; margin-right: 15px; }
  }
  .itpJJt { display: flex; }
  @media (max-width: 800px) {
    .itpJJt { display: none; }
  }
  .hTopFm { display: none; }
  @media (max-width: 800px) {
    .hTopFm { display: flex; -webkit-box-pack: center; justify-content: center; margin-top: 25px; }
  }
  .hGgHdg { display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; width: 200px; height: 54px; background: rgb(188, 255, 238); border-radius: 10px; color: rgb(255, 255, 255); text-transform: uppercase; font-weight: 700; font-size: 16px; border: none; cursor: pointer; }
  @media (max-width: 430px) {
    .hGgHdg { font-size: 15px; }
  }
  .lfeAaw { display: flex; flex-direction: column; width: 100%; margin-top: 50px; gap: 16px; color: rgb(77, 79, 104); }
  @media (max-width: 800px) {
    .lfeAaw { margin-top: 25px; }
  }
  .ihLPBa { width: 100%; height: 488px; }
  .dJabUj { width: 100%; height: 100%; }
  .htSLUt { display: flex; -webkit-box-pack: center; justify-content: center; }
  @media (max-width: 430px) {
    .htSLUt { width: 100%; }
  }
  .kLPRNx { width: 80%; display: inline-block; }
  @media (max-width: 1440px) {
    .kLPRNx { width: 70%; }
  }
  @media (max-width: 1024px) {
    .kLPRNx { width: 80%; }
  }
  @media (max-width: 768px) {
    .kLPRNx { width: 85%; }
  }
  @media (max-width: 430px) {
    .kLPRNx { width: 85%; }
  }
  .VypCQ { position: relative; width: 100%; height: 595px; display: inline-block; }
  @media (max-width: 430px) {
    .VypCQ { height: 288px; }
  }
  .ilSoGt { width: 100%; height: 152px; box-sizing: border-box; cursor: pointer; }
  .dFNUEg { width: 100%; height: 152px; object-fit: cover; border-top-left-radius: 5px; border-top-right-radius: 5px; }
  .cxmavK { position: relative; width: 100%; height: 595px; }
  @media (max-width: 430px) {
    .cxmavK { height: 288px; }
  }
  .oRiKW { width: 100%; height: 595px; object-fit: cover; }
  @media (max-width: 430px) {
    .oRiKW { height: 288px; }
  }
  .kDdItn { display: flex; flex-direction: column; -webkit-box-align: center; align-items: center; max-width: 240px; height: 65px; background: rgb(255, 255, 255); border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; }
  .kwkqHV { font-weight: 700; font-size: 16px; }
  .iEAVoC { font-size: 14px; text-align: center; }
  .cXbSnV { display: flex; flex-direction: column; max-width: 240px; height: 217px; opacity: 0.5; padding: 0px 10px; }
  .ruUaP { display: flex; flex-direction: column; max-width: 240px; height: 217px; opacity: 1; padding: 0px 10px; }
  .bbnRNf { position: absolute; display: flex; -webkit-box-align: center; align-items: center; width: 35px; right: -50px; background: transparent; height: 217px; cursor: pointer; }
  @media (max-width: 430px) {
    .bbnRNf { width: 18px; right: -25px; }
  }
  .jBMAAX { position: absolute; display: flex; -webkit-box-align: center; align-items: center; left: -50px; width: 35px; background: transparent; height: 217px; cursor: pointer; }
  @media (max-width: 430px) {
    .jBMAAX { width: 18px; left: -25px; }
  }
  .kHaNdu { width: 50px; height: 50px; }
  @media (max-width: 430px) {
    .lgHCno { width: 25px; height: 50px; }
  }
  .VdwuQ { width: 45px; height: 100%; cursor: pointer; margin-right: 40px; }
  @media (max-width: 430px) {
    .VdwuQ { display: flex; -webkit-box-pack: end; justify-content: flex-end; margin-right: 15px; }
  }
  .hXUiGT { width: 45px; height: 100%; cursor: pointer; margin-left: 40px; }
  @media (max-width: 430px) {
    .hXUiGT { display: flex; -webkit-box-pack: start; justify-content: flex-start; margin-left: 15px; }
  }
  .jKbeDl { position: absolute; display: flex; top: 14px; right: 23px; max-width: 70%; height: 23px; background: rgba(217, 217, 217, 0.5); padding: 0px 8px; font-size: 16px; opacity: 0.5; border-radius: 5px; }
  @media (max-width: 767px) {
    .jKbeDl { display: none; }
  }
  .esYnOl { position: absolute; max-width: 347px; margin-right: 50px; height: 347px; background: rgba(255, 255, 255, 0.9); top: 22%; left: 15%; padding: 30px 15px 24px 36px; overflow-y: hidden; border-radius: 5px; }
  @media (max-width: 430px) {
    .esYnOl { width: 200px; height: 150px; font-size: 12px; }
  }
  .cQAaJG { display: flex; width: 90%; flex-direction: column; gap: 15px; }
  .cQAaJG p { font-size: 14px; line-height: 28px; margin-bottom: 20px; }
  .hZkFFc { display: flex; -webkit-box-align: center; align-items: center; }
  .dnqusK { font-size: 25px; font-weight: 700; min-width: 0px; color: rgb(19, 57, 77); }
  @media (max-width: 430px) {
    .dnqusK { font-size: 15px; }
  }
  .kqcnGc { color: rgb(148, 150, 168); font-size: 25px; font-weight: 700; margin-left: 5px; flex-shrink: 0; }
  @media (max-width: 430px) {
    .kqcnGc { font-size: 15px; }
  }
  .ejvCkf { display: flex; flex-direction: column; margin-top: 14px; }
  .fMQrst { position: relative; }
  .fMQrst::after { content: ""; position: absolute; bottom: -5px; left: 0px; width: 95%; height: 60px; background: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.6)); pointer-events: none; }
  .khWWqH { overflow-y: auto; max-height: 300px; }
  .eSINDP { display: flex; flex-direction: column; background: rgb(246, 246, 246); width: 100%; gap: 34px; }
  .hMKbJC { display: flex; width: 100%; -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; }
  .gEfrRS { display: flex; width: 80%; font-size: 30px; font-weight: 700; color: rgb(19, 57, 77); text-transform: uppercase; }
  .jgHuIe { padding: 0px; color: black; }
  .jgHuIe.dropdown-opened { padding-bottom: 220px; }
  .impSOm { display: none; margin-bottom: 0px; padding: 0px; border-bottom: 1px solid rgb(243, 243, 243); }
  .iUazdk { max-width: 50%; text-overflow: ellipsis; overflow: hidden; color: gray; border: 1px solid rgb(243, 243, 243); border-radius: 0px; padding: 20px 30px; font-weight: bold; text-transform: uppercase; cursor: pointer; }
  .iUazdk:focus-visible { outline: none; }
  .iUazdk:focus::after { content: none; display: none; }
  .iUazdk.react-tabs__tab--selected { color: black; border-radius: 0px; border-color: rgb(243, 243, 243); }
  .iUazdk:not(:last-child) { border-right: none; }
  .iUazdk:first-child { border-top-left-radius: 10px; }
  .iUazdk:nth-child(2) { border-top-right-radius: 10px; }
  .fetmJe { display: flex; -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; flex-wrap: wrap; gap: 50px; border: none; }
  @font-face { font-family: "Open Sans"; src: url("https://www.widgety.co.uk/packs/_/assets/fonts/openSans/opensans-regular-55835483c304eaa8477fea2c36abba17.woff2") format("woff2"); font-weight: 400; }
  @font-face { font-family: "Open Sans"; src: url("https://www.widgety.co.uk/packs/_/assets/fonts/openSans/opensans-bold-3326e4d74d3924ee1c882c29f5b571c0.woff2") format("woff2"); font-weight: 800; }
  @font-face { font-family: "Open Sans"; src: url("https://www.widgety.co.uk/packs/_/assets/fonts/openSans/opensans-semibold-08952b029e4decbc8ef9fb553cae8cea.woff2") format("woff2"); font-weight: 600; }
  * { margin: 0px; padding: 0px; box-sizing: border-box; font-size: 14px; line-height: 150%; font-family: "Open Sans", sans-serif; }
  body { font-family: "Open Sans", sans-serif; color: rgb(27, 29, 54); }
  a { text-decoration: none; }
</style></head>
<body data-action="show" data-controller="widgets" style="margin: 0px;">
<div id="flash_alerts"></div>
<div id="site_contents">
  <script src="https://jwcruises.com/widgety/cruise_tour_search10zx.js"></script>
  <link href="https://jwcruises.com/widgety/cruise_tour_search.css" media="screen" rel="stylesheet">
  <div><div id="cruise_tour_search_app" class="MainTabs__Container-sc-8ecg3j-0 jgHuIe"><div class="react-tabs" data-rttabs="true"><ul class="MainTabs__CustomTabList-sc-8ecg3j-1 impSOm" role="tablist"><li class="MainTabs__CustomTab-sc-8ecg3j-2 iUazdk react-tabs__tab--selected" role="tab" id="react-tabs-0" aria-selected="true" aria-disabled="false" aria-controls="react-tabs-1" tabindex="0" data-rttab="true">Find a Holiday</li><li class="MainTabs__CustomTab-sc-8ecg3j-2 iUazdk" role="tab" id="react-tabs-2" aria-selected="false" aria-disabled="false" aria-controls="react-tabs-3" data-rttab="true">Find a Ship</li></ul><div class="MainTabs__CustomTabPanel-sc-8ecg3j-3 fetmJe react-tabs__tab-panel--selected" role="tabpanel" id="react-tabs-1" aria-labelledby="react-tabs-0"><div class="StyledComponents__Container-sc-msd6jg-0 fhpewI"><a class="StyledComponents__BackToResult-sc-msd6jg-9 cNPHFD" href="/widgets/twSfxpVB1etB3zAL1yA6/holidays/result.widget"><svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg" alt=""><path d="M8.16 1.226L1 8.727M8.16 16.775L1 9.273" stroke="#000" stroke-width="2" stroke-linecap="round"></path></svg><div class="StyledComponents__BackToResultTitle-sc-msd6jg-10 hxGzlr">Back to Results</div></a><div class="StyledComponents__SliderWrapper-sc-msd6jg-1 gEjDRZ"><div class="slider-container" style="position: relative;"><div aria-live="polite" aria-atomic="true" tabindex="-1" style="position: absolute; width: 1px; height: 1px; overflow: hidden; padding: 0px; margin: -1px; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border: 0px;">Slide 1 of 4</div><div style="align-items: center; justify-content: flex-start; position: absolute; display: flex; z-index: 1; inset: 0px; pointer-events: none;"><div class="slider-control-centerleft" style="pointer-events: auto;"><div class="Carousel__ArrowWrapperLeft-sc-107lxoo-3 dbBakG"><svg width="57" height="106" viewBox="0 0 57 106" fill="none" xmlns="http://www.w3.org/2000/svg" alt="" color="white" class="Carousel__StyledSvg-sc-107lxoo-1 hFslDp"><path d="M51.344 5L6.46 52.016M49.883 100.544L5 53.528" stroke="currentColor" stroke-width="10" stroke-linecap="round"></path></svg></div></div></div><div style="align-items: center; justify-content: flex-end; position: absolute; display: flex; z-index: 1; inset: 0px; pointer-events: none;"><div class="slider-control-centerright" style="pointer-events: auto;"><div class="Carousel__ArrowWrapperRight-sc-107lxoo-2 kumTYL"><svg width="57" height="106" viewBox="0 0 57 106" fill="none" xmlns="http://www.w3.org/2000/svg" alt="" color="white" class="Carousel__StyledSvg-sc-107lxoo-1 hFslDp"><path d="M5 5l44.883 47.016M6.461 100.544l44.883-47.016" stroke="currentColor" stroke-width="10" stroke-linecap="round"></path></svg></div></div></div><div class="slider-frame" aria-label="carousel-slider" role="region" tabindex="0" style="overflow: hidden; width: 100%; position: relative; outline: none; height: auto; transition: height 300ms ease-in-out; will-change: height; user-select: none;"><div class="slider-list" style="width: 1200%; text-align: left; user-select: auto; transform: translateX(calc(-33.3333% + 0px)); display: flex;"><div class="slide prev-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/f7e34dfa-deb0-4d7c-80de-6ba4fea267be/MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook.jpg" alt="Slide 56042" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook. Credits: Photograph by The Travel Nook</div></div></div><div class="slide prev-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/74f5c197-9441-4578-933e-3caf598e595b/MXCZM - Cozumel - Scooter by the Sea - caleb george.jpg" alt="Slide 56043" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Scooter by the Sea - caleb george. Credits: Photograph by Caleb George</div></div></div><div class="slide prev-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/2146628c-acf6-417e-b097-39cb3983a01d/MXCZM - Cozumel - Sea View - clem onojeghuo.jpg" alt="Slide 56044" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Sea View - clem onojeghuo. Credits: Photograph by Clem Onojeghuo</div></div></div><div class="slide prev-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/59/aa5e1494-1e88-4dcb-ad37-3f19bd7ea866/MXCZM - Cozumel - Snorkeling - vlad tchompalov.jpg" alt="Slide 56045" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Snorkeling - vlad tchompalov. Credits: Photograph by Vlad Tchompalov</div></div></div><div class="slide slide-current slide-visible" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/f7e34dfa-deb0-4d7c-80de-6ba4fea267be/MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook.jpg" alt="Slide 56042" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook. Credits: Photograph by The Travel Nook</div></div></div><div class="slide" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/74f5c197-9441-4578-933e-3caf598e595b/MXCZM - Cozumel - Scooter by the Sea - caleb george.jpg" alt="Slide 56043" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Scooter by the Sea - caleb george. Credits: Photograph by Caleb George</div></div></div><div class="slide" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/2146628c-acf6-417e-b097-39cb3983a01d/MXCZM - Cozumel - Sea View - clem onojeghuo.jpg" alt="Slide 56044" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Sea View - clem onojeghuo. Credits: Photograph by Clem Onojeghuo</div></div></div><div class="slide" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/59/aa5e1494-1e88-4dcb-ad37-3f19bd7ea866/MXCZM - Cozumel - Snorkeling - vlad tchompalov.jpg" alt="Slide 56045" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Snorkeling - vlad tchompalov. Credits: Photograph by Vlad Tchompalov</div></div></div><div class="slide next-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/f7e34dfa-deb0-4d7c-80de-6ba4fea267be/MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook.jpg" alt="Slide 56042" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook. Credits: Photograph by The Travel Nook</div></div></div><div class="slide next-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/74f5c197-9441-4578-933e-3caf598e595b/MXCZM - Cozumel - Scooter by the Sea - caleb george.jpg" alt="Slide 56043" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Scooter by the Sea - caleb george. Credits: Photograph by Caleb George</div></div></div><div class="slide next-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/58/2146628c-acf6-417e-b097-39cb3983a01d/MXCZM - Cozumel - Sea View - clem onojeghuo.jpg" alt="Slide 56044" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Sea View - clem onojeghuo. Credits: Photograph by Clem Onojeghuo</div></div></div><div class="slide next-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="Carousel__Wrapper-sc-107lxoo-4 bBUkuH"><img src="https://assets.widgety.co.uk/2024/11/04/11/15/59/aa5e1494-1e88-4dcb-ad37-3f19bd7ea866/MXCZM - Cozumel - Snorkeling - vlad tchompalov.jpg" alt="Slide 56045" class="Carousel__CarouselImage-sc-107lxoo-0 dwxbJC" draggable="false"><div class="Carousel__Credit-sc-107lxoo-5 fBuZIe">MXCZM - Cozumel - Snorkeling - vlad tchompalov. Credits: Photograph by Vlad Tchompalov</div></div></div></div></div></div><div class="StyledComponents__LogoWrapper-sc-msd6jg-2 LoLAv"><div class="StyledComponents__Container-sc-1faule6-0 hLAFjB"><div width="363px" class="StyledComponents__Title-sc-1faule6-1 jFXKVz">Bahamas: Great Stirrup Cay, Bimini &amp; Nassau</div><img src="https://assets.widgety.co.uk/2024/10/08/14/41/00/a88ccc08-f092-4e5d-81cb-1bc186d03c73/Norwegian Cruise Line NCL Logo.jpeg" class="StyledComponents__Logo-sc-1faule6-2 jiBGIS"><div class="StyledComponents__Price-sc-1faule6-3 eyPUBV">From $249 pp</div></div></div><div class="StyledComponents__DetailsWrapper-sc-msd6jg-3 dSBxmm"></div></div><div class="StyledComponents__InfomationContainer-sc-msd6jg-4 cWnQIS"><div class="StyledComponents__InfomationWrapper-sc-msd6jg-5 NdgjS"><div class="StyledComponents__Container-sc-1hgn10s-0 kEyGgv"><div class="StyledComponents__Wrapper-sc-1hgn10s-1 jCaOza"><div class="StyledComponents__DetailsWrapper-sc-1hgn10s-4 dcPJRt"><div class="StyledComponents__Title-sc-1hgn10s-3 dGhXuI">Details</div><div class="StyledComponents__InformationWrapper-sc-1hgn10s-5 fIXYGM"><div class="StyledComponents__DetailsTitle-sc-1hgn10s-7 hUOSlt">Duration</div><div class="StyledComponents__Details-sc-1hgn10s-8 czucif">6 Days</div></div><div class="StyledComponents__InformationWrapper-sc-1hgn10s-5 fIXYGM"><div class="StyledComponents__DetailsTitle-sc-1hgn10s-7 hUOSlt">Ship Name</div><div class="StyledComponents__Details-sc-1hgn10s-8 czucif">Norwegian Getaway</div></div><div class="StyledComponents__InformationWrapper-sc-1hgn10s-5 fIXYGM"><div class="StyledComponents__DetailsTitle-sc-1hgn10s-7 hUOSlt">Start Date</div><div class="StyledComponents__Details-sc-1hgn10s-8 czucif">14 Nov 2025</div></div><div class="StyledComponents__InformationWrapper-sc-1hgn10s-5 fIXYGM"><div class="StyledComponents__DetailsTitle-sc-1hgn10s-7 hUOSlt">End Date</div><div class="StyledComponents__Details-sc-1hgn10s-8 czucif">20 Nov 2025</div></div><div class="StyledComponents__InformationWrapper-sc-1hgn10s-5 fIXYGM"><div class="StyledComponents__DetailsTitle-sc-1hgn10s-7 hUOSlt">Starts At</div><div class="StyledComponents__Details-sc-1hgn10s-8 czucif">Miami, Florida,
          United States </div></div><div class="StyledComponents__InformationWrapper-sc-1hgn10s-5 fIXYGM"><div class="StyledComponents__DetailsTitle-sc-1hgn10s-7 hUOSlt">Ends At</div><div class="StyledComponents__Details-sc-1hgn10s-8 czucif">Miami, Florida,
          United States </div></div><div class="StyledComponents__InformationWrapper-sc-1hgn10s-5 fIXYGM"><div class="StyledComponents__DetailsTitle-sc-1hgn10s-7 hUOSlt">Style</div><div class="StyledComponents__Details-sc-1hgn10s-8 czucif">Resort</div></div><div class="StyledComponents__InformationWrapper-sc-1hgn10s-5 fIXYGM"><div class="StyledComponents__DetailsTitle-sc-1hgn10s-7 hUOSlt">Region</div><div class="StyledComponents__Details-sc-1hgn10s-8 czucif">Caribbean, Americas, South America</div></div><a class="StyledComponents__ButtonWrapper-sc-1hgn10s-9 flCNsD" href="/widgets/twSfxpVB1etB3zAL1yA6/ships/norwegian-getaway.widget?id=NCLGWY-20251114-05-MIA-MIA"><div color="#bcffee" class="StyledComponents__ViewShip-sc-1hgn10s-10 gQdXgq">View Ship</div></a></div></div></div></div></div><div class="ItinerarySection__Container-sc-1nr12fw-0 eSINDP"><div class="ItinerarySection__TitleWrapper-sc-1nr12fw-1 hMKbJC"><div class="ItinerarySection__Title-sc-1nr12fw-2 gEfrRS">Itinerary</div></div><div class="Map__MapContainer-sc-83qfg9-0 ihLPBa"><div id="map" class="Map__MapWrapper-sc-83qfg9-1 dJabUj mapboxgl-map"><div class="mapboxgl-canary" style="visibility: hidden;"></div><div class="mapboxgl-canvas-container mapboxgl-interactive mapboxgl-touch-pan-blocker-override mapboxgl-scrollable-page mapboxgl-touch-drag-pan mapboxgl-touch-zoom-rotate"><canvas class="mapboxgl-canvas" tabindex="0" aria-label="Map" role="region" width="2068" height="976" style="width: 1034px; height: 488px;"></canvas><div class="marker mapboxgl-marker mapboxgl-marker-anchor-center" aria-label="Map marker" style="transform: translate(851px, 30px) translate(-50%, -50%) translate(0px, 0px);">5</div><div class="marker mapboxgl-marker mapboxgl-marker-anchor-center" aria-label="Map marker" style="transform: translate(183px, 458px) translate(-50%, -50%) translate(0px, 0px);">3</div><div class="marker mapboxgl-marker mapboxgl-marker-anchor-center" aria-label="Map marker" style="transform: translate(682px, 35px) translate(-50%, -50%) translate(0px, 0px);">1</div></div><div class="mapboxgl-control-container"><div class="mapboxgl-ctrl-top-left"></div><div class="mapboxgl-ctrl-top-right"></div><div class="mapboxgl-ctrl-bottom-left"><div class="mapboxgl-ctrl" style="display: block;"><a class="mapboxgl-ctrl-logo" target="_blank" rel="noopener nofollow" href="https://www.mapbox.com/" aria-label="Mapbox logo"></a></div></div><div class="mapboxgl-ctrl-bottom-right"><div class="mapboxgl-ctrl mapboxgl-ctrl-group"><button class="mapboxgl-ctrl-zoom-in" type="button" aria-label="Zoom in" aria-disabled="false"><span class="mapboxgl-ctrl-icon" aria-hidden="true" title="Zoom in"></span></button><button class="mapboxgl-ctrl-zoom-out" type="button" aria-label="Zoom out" aria-disabled="false"><span class="mapboxgl-ctrl-icon" aria-hidden="true" title="Zoom out"></span></button><button class="mapboxgl-ctrl-compass" type="button" aria-label="Reset bearing to north"><span class="mapboxgl-ctrl-icon" aria-hidden="true" title="Reset bearing to north" style="transform: rotate(0deg);"></span></button></div><div class="mapboxgl-ctrl mapboxgl-ctrl-attrib"><button class="mapboxgl-ctrl-attrib-button" type="button" aria-label="Toggle attribution"><span class="mapboxgl-ctrl-icon" aria-hidden="true" title="Toggle attribution"></span></button><div class="mapboxgl-ctrl-attrib-inner" role="list"><a href="https://www.mapbox.com/about/maps" target="_blank" title="Mapbox" aria-label="Mapbox">© Mapbox</a> <a href="https://www.openstreetmap.org/copyright/" target="_blank" title="OpenStreetMap" aria-label="OpenStreetMap">© OpenStreetMap</a> <a class="mapbox-improve-map" href="https://apps.mapbox.com/feedback/?owner=mapbox&amp;id=streets-v9&amp;access_token=pk.eyJ1IjoiaWNydWlzZSIsImEiOiI3enBKbmdVIn0.fZ7xpdtCSEvCSf0qtcXzag#/-82.421/23.197/5.7" target="_blank" aria-label="Map feedback" rel="noopener nofollow">Improve this map</a></div></div></div></div><div class="mapboxgl-touch-pan-blocker" style="font-size: 24px;">Use two fingers to move the map</div><div class="mapboxgl-scroll-zoom-blocker" style="font-size: 24px;">Use ⌘ + scroll to zoom the map</div></div></div><div class="StyledComponents__CarouselContainer-sc-1crhnwl-0 htSLUt"><div class="StyledComponents__CarouselWrapper-sc-1crhnwl-1 kLPRNx"><div class="slider-container" style="position: relative;"><div aria-live="polite" aria-atomic="true" tabindex="-1" style="position: absolute; width: 1px; height: 1px; overflow: hidden; padding: 0px; margin: -1px; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border: 0px;">Slide 1 of 4</div><div style="align-items: flex-start; justify-content: flex-start; position: absolute; display: flex; z-index: 1; inset: 0px; pointer-events: none;"><div class="slider-control-topleft" style="pointer-events: auto;"><div class="StyledComponents__ArrowCarouselContainerLeft-sc-1crhnwl-12 jBMAAX"><svg width="57" height="106" viewBox="0 0 57 106" fill="none" xmlns="http://www.w3.org/2000/svg" alt="" color="#009977" class="StyledComponents__StyledCarouselSvg-sc-1crhnwl-13 kHaNdu"><path d="M51.344 5L6.46 52.016M49.883 100.544L5 53.528" stroke="currentColor" stroke-width="10" stroke-linecap="round"></path></svg></div></div></div><div style="align-items: flex-start; justify-content: flex-end; position: absolute; display: flex; z-index: 1; inset: 0px; pointer-events: none;"><div class="slider-control-topright" style="pointer-events: auto;"><div class="StyledComponents__ArrowCarouselContainerRight-sc-1crhnwl-11 bbnRNf"><svg width="57" height="106" viewBox="0 0 57 106" fill="none" xmlns="http://www.w3.org/2000/svg" alt="" color="#009977" class="StyledComponents__StyledCarouselSvg-sc-1crhnwl-13 kHaNdu"><path d="M5 5l44.883 47.016M6.461 100.544l44.883-47.016" stroke="currentColor" stroke-width="10" stroke-linecap="round"></path></svg></div></div></div><div class="slider-frame" aria-label="carousel-slider" role="region" tabindex="0" style="overflow: hidden; width: 100%; position: relative; outline: none; height: auto; transition: height 300ms ease-in-out; will-change: height; user-select: none;"><div class="slider-list" style="width: 300%; text-align: left; user-select: auto; transform: translateX(calc(-33.3333% + 0px)); display: flex;"><div class="slide prev-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 ruUaP"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2019/10/18/08/45/38/cc52e45b-3b2c-4ac5-a990-6c19d47b2020/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159213-71630738" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 1</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Miami, Florida</div></div></div></div><div class="slide prev-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2021/09/02/15/58/07/94468b93-c2d0-4fab-8b3f-bce948af2b66/MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook.jpg" alt="Slide 65159215-71630740" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 3</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Cozumel</div></div></div></div><div class="slide prev-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2024/10/11/16/56/54/49d77c73-e13c-40dc-a96a-6c3d4b3442c3/bahamas-1720653.jpg" alt="Slide 101494702-114731929" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 5</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Great Stirrup Cay</div></div></div></div><div class="slide prev-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2019/10/18/08/45/38/cc52e45b-3b2c-4ac5-a990-6c19d47b2020/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159217-71630742" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 6</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Miami, Florida</div></div></div></div><div class="slide slide-current slide-visible" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 ruUaP"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2019/10/18/08/45/38/cc52e45b-3b2c-4ac5-a990-6c19d47b2020/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159213-71630738" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 1</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Miami, Florida</div></div></div></div><div class="slide slide-visible" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2021/09/02/15/58/07/94468b93-c2d0-4fab-8b3f-bce948af2b66/MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook.jpg" alt="Slide 65159215-71630740" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 3</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Cozumel</div></div></div></div><div class="slide slide-visible" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2024/10/11/16/56/54/49d77c73-e13c-40dc-a96a-6c3d4b3442c3/bahamas-1720653.jpg" alt="Slide 101494702-114731929" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 5</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Great Stirrup Cay</div></div></div></div><div class="slide slide-visible" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2019/10/18/08/45/38/cc52e45b-3b2c-4ac5-a990-6c19d47b2020/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159217-71630742" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 6</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Miami, Florida</div></div></div></div><div class="slide next-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 ruUaP"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2019/10/18/08/45/38/cc52e45b-3b2c-4ac5-a990-6c19d47b2020/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159213-71630738" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 1</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Miami, Florida</div></div></div></div><div class="slide next-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2021/09/02/15/58/07/94468b93-c2d0-4fab-8b3f-bce948af2b66/MXCZM - Cozumel - Nachi Cocom Beach Club Carretera Costera Sur - the travel nook.jpg" alt="Slide 65159215-71630740" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 3</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Cozumel</div></div></div></div><div class="slide next-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2024/10/11/16/56/54/49d77c73-e13c-40dc-a96a-6c3d4b3442c3/bahamas-1720653.jpg" alt="Slide 101494702-114731929" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 5</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Great Stirrup Cay</div></div></div></div><div class="slide next-cloned" style="width: 8.33333%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__ItemContainer-sc-1crhnwl-10 cXbSnV"><div class="StyledComponents__ImageWrapper-sc-1crhnwl-3 ilSoGt"><img src="https://assets.widgety.co.uk/2019/10/18/08/45/38/cc52e45b-3b2c-4ac5-a990-6c19d47b2020/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159217-71630742" class="StyledComponents__CarouselImage-sc-1crhnwl-4 dFNUEg" draggable="false"></div><div class="StyledComponents__Caption-sc-1crhnwl-7 kDdItn"><div class="StyledComponents__Day-sc-1crhnwl-8 kwkqHV">Days 6</div><div class="StyledComponents__City-sc-1crhnwl-9 iEAVoC">Miami, Florida</div></div></div></div></div></div></div></div></div><div class="StyledComponents__SliderContainer-sc-1crhnwl-2 VypCQ"><div class="slider-container" style="position: relative;"><div aria-live="polite" aria-atomic="true" tabindex="-1" style="position: absolute; width: 1px; height: 1px; overflow: hidden; padding: 0px; margin: -1px; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border: 0px;">Slide 1 of 6</div><div style="align-items: center; justify-content: flex-start; position: absolute; display: flex; z-index: 1; inset: 0px; pointer-events: none;"><div class="slider-control-centerleft" style="pointer-events: auto;"><div class="StyledComponents__ArrowSliderContainerLeft-sc-1crhnwl-16 hXUiGT"><svg width="57" height="106" viewBox="0 0 57 106" fill="none" xmlns="http://www.w3.org/2000/svg" alt="" color="white" class="StyledComponents__StyledSliderSvg-sc-1crhnwl-14 lgHCno"><path d="M51.344 5L6.46 52.016M49.883 100.544L5 53.528" stroke="currentColor" stroke-width="10" stroke-linecap="round"></path></svg></div></div></div><div style="align-items: center; justify-content: flex-end; position: absolute; display: flex; z-index: 1; inset: 0px; pointer-events: none;"><div class="slider-control-centerright" style="pointer-events: auto;"><div class="StyledComponents__ArrowSliderContainerRight-sc-1crhnwl-15 VdwuQ"><svg width="57" height="106" viewBox="0 0 57 106" fill="none" xmlns="http://www.w3.org/2000/svg" alt="" color="white" class="StyledComponents__StyledSliderSvg-sc-1crhnwl-14 lgHCno"><path d="M5 5l44.883 47.016M6.461 100.544l44.883-47.016" stroke="currentColor" stroke-width="10" stroke-linecap="round"></path></svg></div></div></div><div class="slider-frame" aria-label="carousel-slider" role="region" tabindex="0" style="overflow: hidden; width: 100%; position: relative; outline: none; height: auto; transition: height 300ms ease-in-out; will-change: height; user-select: none;"><div class="slider-list" style="width: 1800%; text-align: left; user-select: auto; transform: translateX(calc(-33.3333% + 0px)); display: flex;"><div class="slide prev-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/04/b78fe9fd-62d0-4183-9d9e-81cd5fa07ecb/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159213-71630738-55955" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_. Credits: Photograph by Ryan Parker</div></div></div><div class="slide prev-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/04/42f8b085-a0c5-4ca7-85e6-4c02a6f223a0/USMIA - Miami - Miami Beach _Joel de Vriend_.jpg" alt="Slide 65159213-71630738-55956" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - Miami Beach _Joel de Vriend_. Credits: Photograph by Joel de Vriend</div></div></div><div class="slide prev-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/05/697fb9b4-30dc-470f-8ef1-85a81b63412a/USMIA - Miami - South Beach _Joel de Vriend_.jpg" alt="Slide 65159213-71630738-55957" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Joel de Vriend_. Credits: Photograph by Joel de Vriend</div></div></div><div class="slide prev-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/05/b68a4da4-cdb4-4a97-b342-2e61f1eaecb2/USMIA - Miami - South Beach _Julien Borean_.jpg" alt="Slide 65159213-71630738-55958" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Julien Borean_. Credits: Photograph by Julien Borean</div></div></div><div class="slide prev-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/10/d2e1df6d-e21d-471e-a0b9-a6ea0105934a/USMIA - Miami - South Beach _Tuan Nguyen_.jpg" alt="Slide 65159213-71630738-55959" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Tuan Nguyen_. Credits: Photograph by Tuan Nguyen</div></div></div><div class="slide prev-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/09/4316774a-0283-4b97-af04-466f72b617c7/USMIA - Miami - The Confident Hotel _Kelly Russo_.jpg" alt="Slide 65159213-71630738-55960" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - The Confident Hotel _Kelly Russo_. Credits: Photograph by Kelly Russo</div></div></div><div class="slide slide-current slide-visible" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/04/b78fe9fd-62d0-4183-9d9e-81cd5fa07ecb/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159213-71630738-55955" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_. Credits: Photograph by Ryan Parker</div></div></div><div class="slide" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/04/42f8b085-a0c5-4ca7-85e6-4c02a6f223a0/USMIA - Miami - Miami Beach _Joel de Vriend_.jpg" alt="Slide 65159213-71630738-55956" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - Miami Beach _Joel de Vriend_. Credits: Photograph by Joel de Vriend</div></div></div><div class="slide" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/05/697fb9b4-30dc-470f-8ef1-85a81b63412a/USMIA - Miami - South Beach _Joel de Vriend_.jpg" alt="Slide 65159213-71630738-55957" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Joel de Vriend_. Credits: Photograph by Joel de Vriend</div></div></div><div class="slide" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/05/b68a4da4-cdb4-4a97-b342-2e61f1eaecb2/USMIA - Miami - South Beach _Julien Borean_.jpg" alt="Slide 65159213-71630738-55958" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Julien Borean_. Credits: Photograph by Julien Borean</div></div></div><div class="slide" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/10/d2e1df6d-e21d-471e-a0b9-a6ea0105934a/USMIA - Miami - South Beach _Tuan Nguyen_.jpg" alt="Slide 65159213-71630738-55959" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Tuan Nguyen_. Credits: Photograph by Tuan Nguyen</div></div></div><div class="slide" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/09/4316774a-0283-4b97-af04-466f72b617c7/USMIA - Miami - The Confident Hotel _Kelly Russo_.jpg" alt="Slide 65159213-71630738-55960" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - The Confident Hotel _Kelly Russo_. Credits: Photograph by Kelly Russo</div></div></div><div class="slide next-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/04/b78fe9fd-62d0-4183-9d9e-81cd5fa07ecb/USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_.jpg" alt="Slide 65159213-71630738-55955" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - High Rise Buildings near Sea _Ryan Parker_. Credits: Photograph by Ryan Parker</div></div></div><div class="slide next-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/04/42f8b085-a0c5-4ca7-85e6-4c02a6f223a0/USMIA - Miami - Miami Beach _Joel de Vriend_.jpg" alt="Slide 65159213-71630738-55956" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - Miami Beach _Joel de Vriend_. Credits: Photograph by Joel de Vriend</div></div></div><div class="slide next-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/05/697fb9b4-30dc-470f-8ef1-85a81b63412a/USMIA - Miami - South Beach _Joel de Vriend_.jpg" alt="Slide 65159213-71630738-55957" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Joel de Vriend_. Credits: Photograph by Joel de Vriend</div></div></div><div class="slide next-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/05/b68a4da4-cdb4-4a97-b342-2e61f1eaecb2/USMIA - Miami - South Beach _Julien Borean_.jpg" alt="Slide 65159213-71630738-55958" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Julien Borean_. Credits: Photograph by Julien Borean</div></div></div><div class="slide next-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/10/d2e1df6d-e21d-471e-a0b9-a6ea0105934a/USMIA - Miami - South Beach _Tuan Nguyen_.jpg" alt="Slide 65159213-71630738-55959" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - South Beach _Tuan Nguyen_. Credits: Photograph by Tuan Nguyen</div></div></div><div class="slide next-cloned" style="width: 5.55556%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;" inert="true"><div class="StyledComponents__SliderImageWrapper-sc-1crhnwl-5 cxmavK"><img src="https://assets.widgety.co.uk/2024/09/05/09/12/09/4316774a-0283-4b97-af04-466f72b617c7/USMIA - Miami - The Confident Hotel _Kelly Russo_.jpg" alt="Slide 65159213-71630738-55960" class="StyledComponents__SliderImage-sc-1crhnwl-6 oRiKW" draggable="false"><div class="StyledComponents__Credit-sc-1crhnwl-17 jKbeDl">USMIA - Miami - The Confident Hotel _Kelly Russo_. Credits: Photograph by Kelly Russo</div></div></div></div></div></div><div class="StyledComponents__DescriptionContainer-sc-1crhnwl-18 esYnOl"><div class="StyledComponents__ScrollWrapper-sc-1crhnwl-24 fMQrst"><div class="CustomScroll__ScrollContainer-sc-1kldt8q-0 khWWqH"><div class="StyledComponents__DescriptionWrapper-sc-1crhnwl-19 cQAaJG"><div class="StyledComponents__DescriptionTitle-sc-1crhnwl-20 hZkFFc"><span class="StyledComponents__DataTitle-sc-1crhnwl-21 dnqusK">Days 1: Miami, Florida<span class="StyledComponents__DayType-sc-1crhnwl-22 kqcnGc">(CRUISE)</span></span></div><div>Miami, Florida</div><div class="StyledComponents__TimeWrapper-sc-1crhnwl-23 ejvCkf"><div>Depart: 17:30</div></div><div><p></p><p>Miami is one of the world’s most popular holiday spots. It has so much to offer; from its countless beach areas, to culture and museums, from spa and shopping days out, to endless cuban restaurants and cafes. Miami is a multicultural city that has something to offer to everyone. </p><p></p></div></div></div></div></div></div></div><div class="StyledComponents__PricingContainer-sc-msd6jg-6 bVcRJa"><div class="StyledComponents__PricingWrapper-sc-msd6jg-7 ewMRUd"><div class="StyledComponents__Container-sc-r65i6l-0 grcpVJ"><div class="StyledComponents__HeaderWrapper-sc-r65i6l-1 fjZJjG"><div class="StyledComponents__Title-sc-r65i6l-2 igeDkR">Pricing</div><div color="#009977" class="StyledComponents__Price-sc-r65i6l-3 iaoKLf">From $249 pp</div><div class="StyledComponents__ButtonWrapper-sc-r65i6l-4 itpJJt"><a color="#bcffee" target="_blank" class="StyledComponents__StyledLink-sc-r65i6l-7 hGgHdg" href="info@jwcruises.com">Enquire</a></div></div><div class="StyledComponents__MobileButtonWrapper-sc-r65i6l-5 hTopFm"><a color="#bcffee" target="_blank" class="StyledComponents__StyledLink-sc-r65i6l-7 hGgHdg" href="info@jwcruises.com">Enquire</a></div><div class="StyledComponents__AccordionWrapper-sc-r65i6l-8 lfeAaw"><div class="Accordion__Container-sc-waevh1-0 nfiQn"><div class="Accordion__AccordionWrapper-sc-waevh1-1 cSvapm"><div class="Accordion__Title-sc-waevh1-2 hOsDTL">Cruise Only</div><div class="Accordion__Button-sc-waevh1-3 bwVifS"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" alt=""><rect x=".75" y=".75" width="22.5" height="22.5" rx="4.25" stroke="#4D4F68" stroke-width="1.5"></rect><path stroke="#1B1D36" stroke-width="1.5" d="M6.857 11.646h10.286"></path></svg></div></div><div class="StyledComponents__Container-sc-1d5xlo-0 bGiJNR"><div class="StyledComponents__TableWrapper-sc-1d5xlo-2 ejOzAG"><div class="StyledComponents__PricingTable-sc-1d5xlo-3 laAjvC"><div class="StyledComponents__ColWrapper-sc-1d5xlo-7 eMiCPU"><div width="40%" class="StyledComponents__ColumnTitle-sc-1d5xlo-6 jvHgnz">Cabin Categories</div><div width="20%" class="StyledComponents__ColumnTitle-sc-1d5xlo-6 jvppdp">Double Price PP</div><div width="20%" class="StyledComponents__ColumnTitle-sc-1d5xlo-6 jvppdp">Single Price</div><div width="20%" class="StyledComponents__ColumnTitle-sc-1d5xlo-6 jvppdp">Availability</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Aft-Facing Balcony (B1)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$678</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Family Balcony (B4)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$429</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Large Balcony (B6)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$438</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Mid-Ship Balcony (BA)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$419</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Mid-Ship Balcony (BB)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$408</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Balcony (BF)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$399</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Solo Balcony (BT)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$718</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">The Haven Deluxe Owner's Suite with Large Balcony (H2)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$3,428</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">The Haven Owner's Suite with Large Balcony (H3)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$2,689</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">The Haven Aft-Facing Penthouse with Master Bedroom and Balcony (H6)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$2,408</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">The Haven Aft-Facing Penthouse with Master Bedroom and Balcony (HA)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$2,048</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">The Haven Courtyard Penthouse with Balcony (HF)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$2,228</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">The Haven Forward-Facing Penthouse with Balcony (HG)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$1,898</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Haven Penthouse Suite with Balcony (HI)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$2,089</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Family Inside (I4)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$259</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Mid-Ship Inside (IA)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$289</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Inside (IB)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$279</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Inside (IF)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$249</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Solo Inside (IT)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$419</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Family Mini-Suite with Balcony (M4)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$458</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Mini-Suite with Large Balcony (M6)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$499</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Mid-Ship Mini-Suite with Balcony (MA)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$468</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Mid-Ship Mini-Suite with Balcony (MB)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$449</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Family Oceanview (O4)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$319</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Family Oceanview (O5)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$328</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Oceanview with Large Picture Window (OA)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$308</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Mid-Ship Oceanview with Large Picture Window (OB)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$299</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Solo Oceanview (OT)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$518</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div><div class="StyledComponents__Row-sc-1d5xlo-4 cajTJU"><div width="40%" class="StyledComponents__Col-sc-1d5xlo-5 kAJxZC">Studio (T1)</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ"></div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">$0</div><div width="20%" class="StyledComponents__Col-sc-1d5xlo-5 kBGZjQ">Available</div></div></div></div></div></div></div></div></div></div><div class="StyledComponents__BottomButtonsContainer-sc-msd6jg-11 eCSWnu"><a color="#bcffee" target="_blank" class="StyledComponents__StyledLink-sc-msd6jg-12 hQklkn" href="info@jwcruises.com">Enquire</a><a color="#bcffee" class="StyledComponents__StyledLink-sc-msd6jg-12 hQklkn" href="/widgets/twSfxpVB1etB3zAL1yA6/ships/norwegian-getaway.widget">View Ship</a></div></div></div><div class="MainTabs__CustomTabPanel-sc-8ecg3j-3 fetmJe" role="tabpanel" id="react-tabs-3" aria-labelledby="react-tabs-2"></div></div></div></div></div>
  <script>
    // ===== /widgety/widgety_iframe.js =====
    function debounce(e, n, t) {
      var o;
      return function() {
        var r = this
          , a = arguments
          , i = function() {
          o = null,
          t || e.apply(r, a)
        }
          , c = t && !o;
        clearTimeout(o),
        o = setTimeout(i, n),
        c && e.apply(r, a)
      }
    }
    !function(e, n, t, o, r, a) {
      function i(e, n) {
        var t = typeof e[n];
        return "function" == t || !("object" != t || !e[n]) || "unknown" == t
      }
      function c(e, n) {
        return !("object" != typeof e[n] || !e[n])
      }
      function s(e) {
        return "[object Array]" === Object.prototype.toString.call(e)
      }
      function l() {
        var e = "Shockwave Flash"
          , n = "application/x-shockwave-flash";
        if (!w(navigator.plugins) && "object" == typeof navigator.plugins[e]) {
          var t = navigator.plugins[e].description;
          t && !w(navigator.mimeTypes) && navigator.mimeTypes[n] && navigator.mimeTypes[n].enabledPlugin && (S = t.match(/\d+/g))
        }
        if (!S) {
          var o;
          try {
            o = new ActiveXObject("ShockwaveFlash.ShockwaveFlash"),
            S = Array.prototype.slice.call(o.GetVariable("$version").match(/(\d+),(\d+),(\d+),(\d+)/), 1),
            o = null
          } catch (r) {}
        }
        if (!S)
          return !1;
        var a = parseInt(S[0], 10)
          , i = parseInt(S[1], 10);
        return F = a > 9 && i > 0,
        !0
      }
      function u() {
        if (!X) {
          X = !0;
          for (var e = 0; e < q.length; e++)
            q[e]();
          q.length = 0
        }
      }
      function p(e, n) {
        return X ? void e.call(n) : void q.push(function() {
          e.call(n)
        })
      }
      function d() {
        var e = parent;
        if ("" !== B)
          for (var n = 0, t = B.split("."); n < t.length; n++)
            e = e[t[n]];
        return e.easyXDM
      }
      function f(n) {
        return e.easyXDM = J,
        B = n,
        B && (I = "easyXDM_" + B.replace(".", "_") + "_"),
        A
      }
      function h(e) {
        return e.match(D)[3]
      }
      function m(e) {
        return e.match(D)[4] || ""
      }
      function g(e) {
        var n = e.toLowerCase().match(D)
          , t = n[2]
          , o = n[3]
          , r = n[4] || "";
        return ("http:" == t && ":80" == r || "https:" == t && ":443" == r) && (r = ""),
        t + "//" + o + r
      }
      function v(e) {
        if (e = e.replace(L, "$1/"),
        !e.match(/^(http||https):\/\//)) {
          var n = "/" === e.substring(0, 1) ? "" : t.pathname;
          "/" !== n.substring(n.length - 1) && (n = n.substring(0, n.lastIndexOf("/") + 1)),
          e = t.protocol + "//" + t.host + n + e
        }
        for (; j.test(e); )
          e = e.replace(j, "");
        return e
      }
      function y(e, n) {
        var t = ""
          , o = e.indexOf("#");
        -1 !== o && (t = e.substring(o),
        e = e.substring(0, o));
        var r = [];
        for (var i in n)
          n.hasOwnProperty(i) && r.push(i + "=" + a(n[i]));
        return e + (z ? "#" : -1 == e.indexOf("?") ? "?" : "&") + r.join("&") + t
      }
      function w(e) {
        return "undefined" == typeof e
      }
      function b(e, n, t) {
        var o;
        for (var r in n)
          n.hasOwnProperty(r) && (r in e ? (o = n[r],
          "object" == typeof o ? b(e[r], o, t) : t || (e[r] = n[r])) : e[r] = n[r]);
        return e
      }
      function k() {
        var e = n.body.appendChild(n.createElement("form"))
          , t = e.appendChild(n.createElement("input"));
        t.name = I + "TEST" + C,
        E = t !== e.elements[t.name],
        n.body.removeChild(e)
      }
      function _(e) {
        w(E) && k();
        var t;
        E ? t = n.createElement('<iframe name="' + e.props.name + '"/>') : (t = n.createElement("IFRAME"),
        t.name = e.props.name),
        t.id = t.name = e.props.name,
        delete e.props.name,
        "string" == typeof e.container && (e.container = n.getElementById(e.container)),
        e.container || (b(t.style, {
          position: "absolute",
          top: "0px",
          left: "0px"
        }),
        e.container = n.body);
        var o = e.props.src;
        if (e.props.src = "javascript:false",
        b(t, e.props),
        t.border = t.frameBorder = 0,
        t.allowTransparency = !0,
        e.container.appendChild(t),
        e.onLoad && R(t, "load", e.onLoad),
        e.usePost) {
          var r, a = e.container.appendChild(n.createElement("form"));
          if (a.target = t.name,
          a.action = o,
          a.method = "POST",
          "object" == typeof e.usePost)
            for (var i in e.usePost)
              e.usePost.hasOwnProperty(i) && (E ? r = n.createElement('<input name="' + i + '"/>') : (r = n.createElement("INPUT"),
              r.name = i),
              r.value = e.usePost[i],
              a.appendChild(r));
          a.submit(),
          a.parentNode.removeChild(a)
        } else
          t.src = o;
        return e.props.src = o,
        t
      }
      function x(e, n) {
        "string" == typeof e && (e = [e]);
        for (var t, o = e.length; o--; )
          if (t = e[o],
          t = new RegExp("^" == t.substr(0, 1) ? t : "^" + t.replace(/(\*)/g, ".$1").replace(/\?/g, ".") + "$"),
          t.test(n))
            return !0;
        return !1
      }
      function O(o) {
        var r, a = o.protocol;
        if (o.isHost = o.isHost || w(V.xdm_p),
        z = o.hash || !1,
        o.props || (o.props = {}),
        o.isHost)
          o.remote = v(o.remote),
          o.channel = o.channel || "default" + C++,
          o.secret = Math.random().toString(16).substring(2),
          w(a) && (a = g(t.href) == g(o.remote) ? "4" : i(e, "postMessage") || i(n, "postMessage") ? "1" : o.swf && i(e, "ActiveXObject") && l() ? "6" : "Gecko" === navigator.product && "frameElement"in e && -1 == navigator.userAgent.indexOf("WebKit") ? "5" : o.remoteHelper ? "2" : "0");
        else if (o.channel = V.xdm_c.replace(/["'<>\\]/g, ""),
        o.secret = V.xdm_s,
        o.remote = V.xdm_e.replace(/["'<>\\]/g, ""),
        a = V.xdm_p,
        o.acl && !x(o.acl, o.remote))
          throw new Error("Access denied for " + o.remote);
        switch (o.protocol = a,
        a) {
        case "0":
          if (b(o, {
            interval: 100,
            delay: 2e3,
            useResize: !0,
            useParent: !1,
            usePolling: !1
          }, !0),
          o.isHost) {
            if (!o.local) {
              for (var c, s = t.protocol + "//" + t.host, u = n.body.getElementsByTagName("img"), p = u.length; p--; )
                if (c = u[p],
                c.src.substring(0, s.length) === s) {
                  o.local = c.src;
                  break
                }
              o.local || (o.local = e)
            }
            var d = {
              xdm_c: o.channel,
              xdm_p: 0
            };
            o.local === e ? (o.usePolling = !0,
            o.useParent = !0,
            o.local = t.protocol + "//" + t.host + t.pathname + t.search,
            d.xdm_e = o.local,
            d.xdm_pa = 1) : d.xdm_e = v(o.local),
            o.container && (o.useResize = !1,
            d.xdm_po = 1),
            o.remote = y(o.remote, d)
          } else
            b(o, {
              channel: V.xdm_c,
              remote: V.xdm_e,
              useParent: !w(V.xdm_pa),
              usePolling: !w(V.xdm_po),
              useResize: o.useParent ? !1 : o.useResize
            });
          r = [new A.stack.HashTransport(o), new A.stack.ReliableBehavior({}), new A.stack.QueueBehavior({
            encode: !0,
            maxLength: 4e3 - o.remote.length
          }), new A.stack.VerifyBehavior({
            initiate: o.isHost
          })];
          break;
        case "1":
          r = [new A.stack.PostMessageTransport(o)];
          break;
        case "2":
          o.isHost && (o.remoteHelper = v(o.remoteHelper)),
          r = [new A.stack.NameTransport(o), new A.stack.QueueBehavior, new A.stack.VerifyBehavior({
            initiate: o.isHost
          })];
          break;
        case "3":
          r = [new A.stack.NixTransport(o)];
          break;
        case "4":
          r = [new A.stack.SameOriginTransport(o)];
          break;
        case "5":
          r = [new A.stack.FrameElementTransport(o)];
          break;
        case "6":
          S || l(),
          r = [new A.stack.FlashTransport(o)]
        }
        return r.push(new A.stack.QueueBehavior({
          lazy: o.lazy,
          remove: !0
        })),
        r
      }
      function M(e) {
        for (var n, t = {
          incoming: function(e, n) {
            this.up.incoming(e, n)
          },
          outgoing: function(e, n) {
            this.down.outgoing(e, n)
          },
          callback: function(e) {
            this.up.callback(e)
          },
          init: function() {
            this.down.init()
          },
          destroy: function() {
            this.down.destroy()
          }
        }, o = 0, r = e.length; r > o; o++)
          n = e[o],
          b(n, t, !0),
          0 !== o && (n.down = e[o - 1]),
          o !== r - 1 && (n.up = e[o + 1]);
        return n
      }
      function T(e) {
        e.up.down = e.down,
        e.down.up = e.up,
        e.up = e.down = null
      }
      var E, S, F, R, N, P = this, C = Math.floor(1e4 * Math.random()), H = Function.prototype, D = /^((http.?:)\/\/([^:\/\s]+)(:\d+)*)/, j = /[\-\w]+\/\.\.\//, L = /([^:])\/\//g, B = "", A = {}, J = e.easyXDM, I = "easyXDM_", z = !1;
      if (i(e, "addEventListener"))
        R = function(e, n, t) {
          e.addEventListener(n, t, !1)
        }
        ,
        N = function(e, n, t) {
          e.removeEventListener(n, t, !1)
        }
        ;
      else {
        if (!i(e, "attachEvent"))
          throw new Error("Browser not supported");
        R = function(e, n, t) {
          e.attachEvent("on" + n, t)
        }
        ,
        N = function(e, n, t) {
          e.detachEvent("on" + n, t)
        }
      }
      var W, X = !1, q = [];
      if ("readyState"in n ? (W = n.readyState,
      X = "complete" == W || ~navigator.userAgent.indexOf("AppleWebKit/") && ("loaded" == W || "interactive" == W)) : X = !!n.body,
      !X) {
        if (i(e, "addEventListener"))
          R(n, "DOMContentLoaded", u);
        else if (R(n, "readystatechange", function() {
          "complete" == n.readyState && u()
        }),
        n.documentElement.doScroll && e === top) {
          var U = function() {
            if (!X) {
              try {
                n.documentElement.doScroll("left")
              } catch (e) {
                return void o(U, 1)
              }
              u()
            }
          };
          U()
        }
        R(e, "load", u)
      }
      var V = function(e) {
        e = e.substring(1).split("&");
        for (var n, t = {}, o = e.length; o--; )
          n = e[o].split("="),
          t[n[0]] = r(n[1]);
        return t
      }(/xdm_e=/.test(t.search) ? t.search : t.hash)
        , Q = function() {
        var e = {}
          , n = {
          a: [1, 2, 3]
        }
          , t = '{"a":[1,2,3]}';
        return "undefined" != typeof JSON && "function" == typeof JSON.stringify && JSON.stringify(n).replace(/\s/g, "") === t ? JSON : (Object.toJSON && Object.toJSON(n).replace(/\s/g, "") === t && (e.stringify = Object.toJSON),
        "function" == typeof String.prototype.evalJSON && (n = t.evalJSON(),
        n.a && 3 === n.a.length && 3 === n.a[2] && (e.parse = function(e) {
          return e.evalJSON()
        }
        )),
        e.stringify && e.parse ? (Q = function() {
          return e
        }
        ,
        e) : null)
      };
      b(A, {
        version: "2.4.19.3",
        query: V,
        stack: {},
        apply: b,
        getJSONObject: Q,
        whenReady: p,
        noConflict: f
      }),
      A.DomHelper = {
        on: R,
        un: N,
        requiresJSON: function(t) {
          c(e, "JSON") || n.write('<script type="text/javascript" src="' + t + '"></' + 'script>')
        }
      },
      function() {
        var e = {};
        A.Fn = {
          set: function(n, t) {
            e[n] = t
          },
          get: function(n, t) {
            if (e.hasOwnProperty(n)) {
              var o = e[n];
              return t && delete e[n],
              o
            }
          }
        }
      }(),
      A.Socket = function(e) {
        var n = M(O(e).concat([{
          incoming: function(n, t) {
            e.onMessage(n, t)
          },
          callback: function(n) {
            e.onReady && e.onReady(n)
          }
        }]))
          , t = g(e.remote);
        this.origin = g(e.remote),
        this.destroy = function() {
          n.destroy()
        }
        ,
        this.postMessage = function(e) {
          n.outgoing(e, t)
        }
        ,
        n.init()
      }
      ,
      A.Rpc = function(e, n) {
        if (n.local)
          for (var t in n.local)
            if (n.local.hasOwnProperty(t)) {
              var o = n.local[t];
              "function" == typeof o && (n.local[t] = {
                method: o
              })
            }
        var r = M(O(e).concat([new A.stack.RpcBehavior(this,n), {
          callback: function(n) {
            e.onReady && e.onReady(n)
          }
        }]));
        this.origin = g(e.remote),
        this.destroy = function() {
          r.destroy()
        }
        ,
        r.init()
      }
      ,
      A.stack.SameOriginTransport = function(e) {
        var n, r, a, i;
        return n = {
          outgoing: function(e, n, t) {
            a(e),
            t && t()
          },
          destroy: function() {
            r && (r.parentNode.removeChild(r),
            r = null)
          },
          onDOMReady: function() {
            i = g(e.remote),
            e.isHost ? (b(e.props, {
              src: y(e.remote, {
                xdm_e: t.protocol + "//" + t.host + t.pathname,
                xdm_c: e.channel,
                xdm_p: 4
              }),
              name: I + e.channel + "_provider"
            }),
            r = _(e),
            A.Fn.set(e.channel, function(e) {
              return a = e,
              o(function() {
                n.up.callback(!0)
              }, 0),
              function(e) {
                n.up.incoming(e, i)
              }
            })) : (a = d().Fn.get(e.channel, !0)(function(e) {
              n.up.incoming(e, i)
            }),
            o(function() {
              n.up.callback(!0)
            }, 0))
          },
          init: function() {
            p(n.onDOMReady, n)
          }
        }
      }
      ,
      A.stack.FlashTransport = function(e) {
        function r(e) {
          o(function() {
            c.up.incoming(e, l)
          }, 0)
        }
        function i(t) {
          var o = e.swf + "?host=" + e.isHost
            , r = "easyXDM_swf_" + Math.floor(1e4 * Math.random());
          A.Fn.set("flash_loaded" + t.replace(/[\-.]/g, "_"), function() {
            A.stack.FlashTransport[t].swf = u = d.firstChild;
            for (var e = A.stack.FlashTransport[t].queue, n = 0; n < e.length; n++)
              e[n]();
            e.length = 0
          }),
          e.swfContainer ? d = "string" == typeof e.swfContainer ? n.getElementById(e.swfContainer) : e.swfContainer : (d = n.createElement("div"),
          b(d.style, F && e.swfNoThrottle ? {
            height: "200px",
            width: "200px",
            position: "fixed",
            right: 0,
            top: 0
          } : {
            height: "100px",
            width: "100px",
            position: "absolute",
            overflow: "hidden",
            right: 0,
            top: 0
          }),
          n.body.appendChild(d));
          var i = "callback=flash_loaded" + a(t.replace(/[\-.]/g, "_")) + "&proto=" + P.location.protocol + "&domain=" + a(h(P.location.href)) + "&port=" + a(m(P.location.href)) + "&ns=" + a(B);
          d.innerHTML = "<object height='20' width='20' type='application/x-shockwave-flash' id='" + r + "' data='" + o + "'><param name='allowScriptAccess' value='always'></param><param name='wmode' value='transparent'><param name='movie' value='" + o + "'></param><param name='flashvars' value='" + i + "'></param><embed type='application/x-shockwave-flash' FlashVars='" + i + "' allowScriptAccess='always' wmode='transparent' src='" + o + "' height='100' width='100'></embed></object>"
        }
        var c, s, l, u, d;
        return c = {
          outgoing: function(n, t, o) {
            u.postMessage(e.channel, n.toString()),
            o && o()
          },
          destroy: function() {
            try {
              u.destroyChannel(e.channel)
            } catch (n) {}
            u = null,
            s && (s.parentNode.removeChild(s),
            s = null)
          },
          onDOMReady: function() {
            l = e.remote,
            A.Fn.set("flash_" + e.channel + "_init", function() {
              o(function() {
                c.up.callback(!0)
              })
            }),
            A.Fn.set("flash_" + e.channel + "_onMessage", r),
            e.swf = v(e.swf);
            var n = h(e.swf)
              , a = function() {
              A.stack.FlashTransport[n].init = !0,
              u = A.stack.FlashTransport[n].swf,
              u.createChannel(e.channel, e.secret, g(e.remote), e.isHost),
              e.isHost && (F && e.swfNoThrottle && b(e.props, {
                position: "fixed",
                right: 0,
                top: 0,
                height: "20px",
                width: "20px"
              }),
              b(e.props, {
                src: y(e.remote, {
                  xdm_e: g(t.href),
                  xdm_c: e.channel,
                  xdm_p: 6,
                  xdm_s: e.secret
                }),
                name: I + e.channel + "_provider"
              }),
              s = _(e))
            };
            A.stack.FlashTransport[n] && A.stack.FlashTransport[n].init ? a() : A.stack.FlashTransport[n] ? A.stack.FlashTransport[n].queue.push(a) : (A.stack.FlashTransport[n] = {
              queue: [a]
            },
            i(n))
          },
          init: function() {
            p(c.onDOMReady, c)
          }
        }
      }
      ,
      A.stack.PostMessageTransport = function(n) {
        function r(e) {
          if (e.origin)
            return g(e.origin);
          if (e.uri)
            return g(e.uri);
          if (e.domain)
            return t.protocol + "//" + e.domain;
          throw "Unable to retrieve the origin of the event"
        }
        function a(e) {
          var t = r(e);
          t == l && e.data.substring(0, n.channel.length + 1) == n.channel + " " && i.up.incoming(e.data.substring(n.channel.length + 1), t)
        }
        var i, c, s, l;
        return i = {
          outgoing: function(e, t, o) {
            s.postMessage(n.channel + " " + e, t || l),
            o && o()
          },
          destroy: function() {
            N(e, "message", a),
            c && (s = null,
            c.parentNode.removeChild(c),
            c = null)
          },
          onDOMReady: function() {
            if (l = g(n.remote),
            n.isHost) {
              var r = function(t) {
                t.data == n.channel + "-ready" && (s = "postMessage"in c.contentWindow ? c.contentWindow : c.contentWindow.document,
                N(e, "message", r),
                R(e, "message", a),
                o(function() {
                  i.up.callback(!0)
                }, 0))
              };
              R(e, "message", r),
              b(n.props, {
                src: y(n.remote, {
                  xdm_e: g(t.href),
                  xdm_c: n.channel,
                  xdm_p: 1
                }),
                name: I + n.channel + "_provider"
              }),
              c = _(n)
            } else
              R(e, "message", a),
              s = "postMessage"in e.parent ? e.parent : e.parent.document,
              s.postMessage(n.channel + "-ready", l),
              o(function() {
                i.up.callback(!0)
              }, 0)
          },
          init: function() {
            p(i.onDOMReady, i)
          }
        }
      }
      ,
      A.stack.FrameElementTransport = function(r) {
        var a, i, c, s;
        return a = {
          outgoing: function(e, n, t) {
            c.call(this, e),
            t && t()
          },
          destroy: function() {
            i && (i.parentNode.removeChild(i),
            i = null)
          },
          onDOMReady: function() {
            s = g(r.remote),
            r.isHost ? (b(r.props, {
              src: y(r.remote, {
                xdm_e: g(t.href),
                xdm_c: r.channel,
                xdm_p: 5
              }),
              name: I + r.channel + "_provider"
            }),
            i = _(r),
            i.fn = function(e) {
              return delete i.fn,
              c = e,
              o(function() {
                a.up.callback(!0)
              }, 0),
              function(e) {
                a.up.incoming(e, s)
              }
            }
            ) : (n.referrer && g(n.referrer) != V.xdm_e && (e.top.location = V.xdm_e),
            c = e.frameElement.fn(function(e) {
              a.up.incoming(e, s)
            }),
            a.up.callback(!0))
          },
          init: function() {
            p(a.onDOMReady, a)
          }
        }
      }
      ,
      A.stack.NameTransport = function(e) {
        function n(n) {
          var t = e.remoteHelper + (c ? "#_3" : "#_2") + e.channel;
          s.contentWindow.sendMessage(n, t)
        }
        function t() {
          c ? 2 !== ++u && c || i.up.callback(!0) : (n("ready"),
          i.up.callback(!0))
        }
        function r(e) {
          i.up.incoming(e, f)
        }
        function a() {
          d && o(function() {
            d(!0)
          }, 0)
        }
        var i, c, s, l, u, d, f, h;
        return i = {
          outgoing: function(e, t, o) {
            d = o,
            n(e)
          },
          destroy: function() {
            s.parentNode.removeChild(s),
            s = null,
            c && (l.parentNode.removeChild(l),
            l = null)
          },
          onDOMReady: function() {
            c = e.isHost,
            u = 0,
            f = g(e.remote),
            e.local = v(e.local),
            c ? (A.Fn.set(e.channel, function(n) {
              c && "ready" === n && (A.Fn.set(e.channel, r),
              t())
            }),
            h = y(e.remote, {
              xdm_e: e.local,
              xdm_c: e.channel,
              xdm_p: 2
            }),
            b(e.props, {
              src: h + "#" + e.channel,
              name: I + e.channel + "_provider"
            }),
            l = _(e)) : (e.remoteHelper = e.remote,
            A.Fn.set(e.channel, r));
            var n = function() {
              var r = s || this;
              N(r, "load", n),
              A.Fn.set(e.channel + "_load", a),
              function i() {
                "function" == typeof r.contentWindow.sendMessage ? t() : o(i, 50)
              }()
            };
            s = _({
              props: {
                src: e.local + "#_4" + e.channel
              },
              onLoad: n
            })
          },
          init: function() {
            p(i.onDOMReady, i)
          }
        }
      }
      ,
      A.stack.HashTransport = function(n) {
        function t(e) {
          if (m) {
            var t = n.remote + "#" + f++ + "_" + e;
            (s || !v ? m.contentWindow : m).location = t
          }
        }
        function r(e) {
          d = e,
          c.up.incoming(d.substring(d.indexOf("_") + 1), y)
        }
        function a() {
          if (h) {
            var e = h.location.href
              , n = ""
              , t = e.indexOf("#");
            -1 != t && (n = e.substring(t)),
            n && n != d && r(n)
          }
        }
        function i() {
          l = setInterval(a, u)
        }
        var c, s, l, u, d, f, h, m, v, y;
        return c = {
          outgoing: function(e) {
            t(e)
          },
          destroy: function() {
            e.clearInterval(l),
            (s || !v) && m.parentNode.removeChild(m),
            m = null
          },
          onDOMReady: function() {
            if (s = n.isHost,
            u = n.interval,
            d = "#" + n.channel,
            f = 0,
            v = n.useParent,
            y = g(n.remote),
            s) {
              if (b(n.props, {
                src: n.remote,
                name: I + n.channel + "_provider"
              }),
              v)
                n.onLoad = function() {
                  h = e,
                  i(),
                  c.up.callback(!0)
                }
                ;
              else {
                var t = 0
                  , r = n.delay / 50;
                !function a() {
                  if (++t > r)
                    throw new Error("Unable to reference listenerwindow");
                  try {
                    h = m.contentWindow.frames[I + n.channel + "_consumer"]
                  } catch (e) {}
                  h ? (i(),
                  c.up.callback(!0)) : o(a, 50)
                }()
              }
              m = _(n)
            } else
              h = e,
              i(),
              v ? (m = parent,
              c.up.callback(!0)) : (b(n, {
                props: {
                  src: n.remote + "#" + n.channel + new Date,
                  name: I + n.channel + "_consumer"
                },
                onLoad: function() {
                  c.up.callback(!0)
                }
              }),
              m = _(n))
          },
          init: function() {
            p(c.onDOMReady, c)
          }
        }
      }
      ,
      A.stack.ReliableBehavior = function() {
        var e, n, t = 0, o = 0, r = "";
        return e = {
          incoming: function(a, i) {
            var c = a.indexOf("_")
              , s = a.substring(0, c).split(",");
            a = a.substring(c + 1),
            s[0] == t && (r = "",
            n && n(!0)),
            a.length > 0 && (e.down.outgoing(s[1] + "," + t + "_" + r, i),
            o != s[1] && (o = s[1],
            e.up.incoming(a, i)))
          },
          outgoing: function(a, i, c) {
            r = a,
            n = c,
            e.down.outgoing(o + "," + ++t + "_" + a, i)
          }
        }
      }
      ,
      A.stack.QueueBehavior = function(e) {
        function n() {
          if (e.remove && 0 === c.length)
            return void T(t);
          if (!s && 0 !== c.length && !i) {
            s = !0;
            var r = c.shift();
            t.down.outgoing(r.data, r.origin, function(e) {
              s = !1,
              r.callback && o(function() {
                r.callback(e)
              }, 0),
              n()
            })
          }
        }
        var t, i, c = [], s = !0, l = "", u = 0, p = !1, d = !1;
        return t = {
          init: function() {
            w(e) && (e = {}),
            e.maxLength && (u = e.maxLength,
            d = !0),
            e.lazy ? p = !0 : t.down.init()
          },
          callback: function(e) {
            s = !1;
            var o = t.up;
            n(),
            o.callback(e)
          },
          incoming: function(n, o) {
            if (d) {
              var a = n.indexOf("_")
                , i = parseInt(n.substring(0, a), 10);
              l += n.substring(a + 1),
              0 === i && (e.encode && (l = r(l)),
              t.up.incoming(l, o),
              l = "")
            } else
              t.up.incoming(n, o)
          },
          outgoing: function(o, r, i) {
            e.encode && (o = a(o));
            var s, l = [];
            if (d) {
              for (; 0 !== o.length; )
                s = o.substring(0, u),
                o = o.substring(s.length),
                l.push(s);
              for (; s = l.shift(); )
                c.push({
                  data: l.length + "_" + s,
                  origin: r,
                  callback: 0 === l.length ? i : null
                })
            } else
              c.push({
                data: o,
                origin: r,
                callback: i
              });
            p ? t.down.init() : n()
          },
          destroy: function() {
            i = !0,
            t.down.destroy()
          }
        }
      }
      ,
      A.stack.VerifyBehavior = function(e) {
        function n() {
          o = Math.random().toString(16).substring(2),
          t.down.outgoing(o)
        }
        var t, o, r;
        return t = {
          incoming: function(a, i) {
            var c = a.indexOf("_");
            -1 === c ? a === o ? t.up.callback(!0) : r || (r = a,
            e.initiate || n(),
            t.down.outgoing(a)) : a.substring(0, c) === r && t.up.incoming(a.substring(c + 1), i)
          },
          outgoing: function(e, n, r) {
            t.down.outgoing(o + "_" + e, n, r)
          },
          callback: function() {
            e.initiate && n()
          }
        }
      }
      ,
      A.stack.RpcBehavior = function(e, n) {
        function t(e) {
          e.jsonrpc = "2.0",
          a.down.outgoing(i.stringify(e))
        }
        function o(e, n) {
          var o = Array.prototype.slice;
          return function() {
            var r, a = arguments.length, i = {
              method: n
            };
            a > 0 && "function" == typeof arguments[a - 1] ? (a > 1 && "function" == typeof arguments[a - 2] ? (r = {
              success: arguments[a - 2],
              error: arguments[a - 1]
            },
            i.params = o.call(arguments, 0, a - 2)) : (r = {
              success: arguments[a - 1]
            },
            i.params = o.call(arguments, 0, a - 1)),
            l["" + ++c] = r,
            i.id = c) : i.params = o.call(arguments, 0),
            e.namedParams && 1 === i.params.length && (i.params = i.params[0]),
            t(i)
          }
        }
        function r(e, n, o, r) {
          if (!o)
            return void (n && t({
              id: n,
              error: {
                code: -32601,
                message: "Procedure not found."
              }
            }));
          var a, i;
          n ? (a = function(e) {
            a = H,
            t({
              id: n,
              result: e
            })
          }
          ,
          i = function(e, o) {
            i = H;
            var r = {
              id: n,
              error: {
                code: -32099,
                message: e
              }
            };
            o && (r.error.data = o),
            t(r)
          }
          ) : a = i = H,
          s(r) || (r = [r]);
          try {
            var c = o.method.apply(o.scope, r.concat([a, i]));
            w(c) || a(c)
          } catch (l) {
            i(l.message)
          }
        }
        var a, i = n.serializer || Q(), c = 0, l = {};
        return a = {
          incoming: function(e) {
            var o = i.parse(e);
            if (o.method)
              n.handle ? n.handle(o, t) : r(o.method, o.id, n.local[o.method], o.params);
            else {
              var a = l[o.id];
              o.error ? a.error && a.error(o.error) : a.success && a.success(o.result),
              delete l[o.id]
            }
          },
          init: function() {
            if (n.remote)
              for (var t in n.remote)
                n.remote.hasOwnProperty(t) && (e[t] = o(n.remote[t], t));
            a.down.init()
          },
          destroy: function() {
            for (var t in n.remote)
              n.remote.hasOwnProperty(t) && e.hasOwnProperty(t) && delete e[t];
            a.down.destroy()
          }
        }
      }
      ,
      P.easyXDM = A
    }(window, document, location, window.setTimeout, decodeURIComponent, encodeURIComponent),

    setFullHeight = function(e, n) {
      var t = function(t) {
        if (t.origin === n && "resize" === t.data.type)
          try {
            e.height = t.data.height + "px",
            e.style.height = t.data.height + "px"
          } catch (o) {}
      };
      window.addEventListener ? window.addEventListener("message", t, !1) : window.attachEvent && window.attachEvent("onmessage", t);
      var o = function() {
        e.contentWindow.postMessage({
          type: "resizeWidget"
        }, n)
      };
      window.addEventListener("resize", debounce(o, 1e3)),
      e.addEventListener("load", o)
    };

    var widgets = document.querySelectorAll('iframe[src*="widget"]'),
        script = document.querySelector('script[src*="widgety_iframe"]'),
        i, len;
    for (i = 0,
    len = widgets.length; len > i; i++) {
      var widget = widgets[i]
        , src = "https://www.widgety.co.uk/assets/widgety_cruise_tour_search_navigation_script.js".split("/");
        // script.getAttribute("src").split("/");
      setFullHeight(widget, "https://jwcruises.com") //src[0] + "//" + src[2])
    }


    // ===== /widgety/widgety_cruise_tour_search_navigation_script.js =====
    var widgets = document.querySelectorAll('iframe[src*="widget"]')
      , script = document.querySelector('script[src*="widgety_cruise_tour_search_navigation_script"]')
      , src = "https://www.widgety.co.uk/assets/widgety_cruise_tour_search_navigation_script.js".split("/");
      // script.getAttribute("src").split("/");
    widgets.forEach(function(t) {
      t.addEventListener("load", function() {
        const e = {
          tabs: t.getAttribute("tabs"),
          "preview-nav": t.getAttribute("preview-nav"),
          "results-nav": t.getAttribute("results-nav")
        };
        url = "https://www.widgety.co.uk",   // .concat(src[0], "//").concat(src[2]),
        t.contentWindow.postMessage(e, url)
      })
    });
  </script>
</body></html>
