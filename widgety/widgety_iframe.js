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
      c(e, "JSON") || n.write('<script type="text/javascript" src="' + t + '"></script>')
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
      d.innerHTML = "<object height='20' width='20' type='application/x-shockwave-flash' id='" + r + "' data='" + o + "'><param name='allowScriptAccess' value='always'></param><param name='wmode' value='transparent'><param name='movie' value='" + o + "'></param><param name='flashvars' value='" + i + "'></param><embed type='application/x-shockwave-flash' FlashVars='" + i + "' allowScriptAccess='always' wmode='transparent' src='" + o + "' height='1' width='1'></embed></object>"
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
}
;
var widgets = document.querySelectorAll('iframe[src*="widgets/"]'), script = document.querySelector('script[src*="widgety_iframe"]'), i, len;
for (i = 0,
len = widgets.length; len > i; i++) {
  var widget = widgets[i]
    , src = script.getAttribute("src").split("/");
  setFullHeight(widget, src[0] + "//" + src[2])
}
