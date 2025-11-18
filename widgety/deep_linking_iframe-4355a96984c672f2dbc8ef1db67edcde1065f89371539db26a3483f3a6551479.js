!function(e, t, n, r, o, a) {
  function i(e, t) {
    var n = typeof e[t];
    return "function" == n || !("object" != n || !e[t]) || "unknown" == n
  }
  function c(e, t) {
    return !("object" != typeof e[t] || !e[t])
  }
  function s(e) {
    return "[object Array]" === Object.prototype.toString.call(e)
  }
  function l() {
    var e = "Shockwave Flash"
      , t = "application/x-shockwave-flash";
    if (!w(navigator.plugins) && "object" == typeof navigator.plugins[e]) {
      var n = navigator.plugins[e].description;
      n && !w(navigator.mimeTypes) && navigator.mimeTypes[t] && navigator.mimeTypes[t].enabledPlugin && (T = n.match(/\d+/g))
    }
    if (!T) {
      var r;
      try {
        r = new ActiveXObject("ShockwaveFlash.ShockwaveFlash"),
        T = Array.prototype.slice.call(r.GetVariable("$version").match(/(\d+),(\d+),(\d+),(\d+)/), 1),
        r = null
      } catch (o) {}
    }
    if (!T)
      return !1;
    var a = parseInt(T[0], 10)
      , i = parseInt(T[1], 10);
    return M = a > 9 && i > 0,
    !0
  }
  function u() {
    if (!W) {
      W = !0;
      for (var e = 0; e < q.length; e++)
        q[e]();
      q.length = 0
    }
  }
  function f(e, t) {
    return W ? void e.call(t) : void q.push(function() {
      e.call(t)
    })
  }
  function p() {
    var e = parent;
    if ("" !== H)
      for (var t = 0, n = H.split("."); t < n.length; t++)
        e = e[n[t]];
    return e.easyXDM
  }
  function d(t) {
    return e.easyXDM = B,
    H = t,
    H && (J = "easyXDM_" + H.replace(".", "_") + "_"),
    I
  }
  function h(e) {
    return e.match(j)[3]
  }
  function g(e) {
    return e.match(j)[4] || ""
  }
  function m(e) {
    var t = e.toLowerCase().match(j)
      , n = t[2]
      , r = t[3]
      , o = t[4] || "";
    return ("http:" == n && ":80" == o || "https:" == n && ":443" == o) && (o = ""),
    n + "//" + r + o
  }
  function v(e) {
    if (e = e.replace(A, "$1/"),
    !e.match(/^(http||https):\/\//)) {
      var t = "/" === e.substring(0, 1) ? "" : n.pathname;
      "/" !== t.substring(t.length - 1) && (t = t.substring(0, t.lastIndexOf("/") + 1)),
      e = n.protocol + "//" + n.host + t + e
    }
    for (; L.test(e); )
      e = e.replace(L, "");
    return e
  }
  function y(e, t) {
    var n = ""
      , r = e.indexOf("#");
    -1 !== r && (n = e.substring(r),
    e = e.substring(0, r));
    var o = [];
    for (var i in t)
      t.hasOwnProperty(i) && o.push(i + "=" + a(t[i]));
    return e + (U ? "#" : -1 == e.indexOf("?") ? "?" : "&") + o.join("&") + n
  }
  function w(e) {
    return "undefined" == typeof e
  }
  function _(e, t, n) {
    var r;
    for (var o in t)
      t.hasOwnProperty(o) && (o in e ? (r = t[o],
      "object" == typeof r ? _(e[o], r, n) : n || (e[o] = t[o])) : e[o] = t[o]);
    return e
  }
  function b() {
    var e = t.body.appendChild(t.createElement("form"))
      , n = e.appendChild(t.createElement("input"));
    n.name = J + "TEST" + D,
    R = n !== e.elements[n.name],
    t.body.removeChild(e)
  }
  function x(e) {
    w(R) && b();
    var n;
    R ? n = t.createElement('<iframe name="' + e.props.name + '"/>') : (n = t.createElement("IFRAME"),
    n.name = e.props.name),
    n.id = n.name = e.props.name,
    delete e.props.name,
    "string" == typeof e.container && (e.container = t.getElementById(e.container)),
    e.container || (_(n.style, {
      position: "relative",
      top: "0px",
      left: "0px"
    }),
    e.container = t.body);
    var r = e.props.src;
    if (e.props.src = "javascript:false",
    _(n, e.props),
    n.border = n.frameBorder = 0,
    n.allowTransparency = !0,
    e.container.appendChild(n),
    e.onLoad && P(n, "load", e.onLoad),
    e.usePost) {
      var o, a = e.container.appendChild(t.createElement("form"));
      if (a.target = n.name,
      a.action = r,
      a.method = "POST",
      "object" == typeof e.usePost)
        for (var i in e.usePost)
          e.usePost.hasOwnProperty(i) && (R ? o = t.createElement('<input name="' + i + '"/>') : (o = t.createElement("INPUT"),
          o.name = i),
          o.value = e.usePost[i],
          a.appendChild(o));
      a.submit(),
      a.parentNode.removeChild(a)
    } else
      n.src = r;
    return e.props.src = r,
    n
  }
  function k(e, t) {
    "string" == typeof e && (e = [e]);
    for (var n, r = e.length; r--; )
      if (n = e[r],
      n = new RegExp("^" == n.substr(0, 1) ? n : "^" + n.replace(/(\*)/g, ".$1").replace(/\?/g, ".") + "$"),
      n.test(t))
        return !0;
    return !1
  }
  function O(r) {
    var o, a = r.protocol;
    if (r.isHost = r.isHost || w(X.xdm_p),
    U = r.hash || !1,
    r.props || (r.props = {}),
    r.isHost)
      r.remote = v(r.remote),
      r.channel = r.channel || "default" + D++,
      r.secret = Math.random().toString(16).substring(2),
      w(a) && (a = m(n.href) == m(r.remote) ? "4" : i(e, "postMessage") || i(t, "postMessage") ? "1" : r.swf && i(e, "ActiveXObject") && l() ? "6" : "Gecko" === navigator.product && "frameElement"in e && -1 == navigator.userAgent.indexOf("WebKit") ? "5" : r.remoteHelper ? "2" : "0");
    else if (r.channel = X.xdm_c.replace(/["'<>\\]/g, ""),
    r.secret = X.xdm_s,
    r.remote = X.xdm_e.replace(/["'<>\\]/g, ""),
    a = X.xdm_p,
    r.acl && !k(r.acl, r.remote))
      throw new Error("Access denied for " + r.remote);
    switch (r.protocol = a,
    a) {
    case "0":
      if (_(r, {
        interval: 100,
        delay: 2e3,
        useResize: !0,
        useParent: !1,
        usePolling: !1
      }, !0),
      r.isHost) {
        if (!r.local) {
          for (var c, s = n.protocol + "//" + n.host, u = t.body.getElementsByTagName("img"), f = u.length; f--; )
            if (c = u[f],
            c.src.substring(0, s.length) === s) {
              r.local = c.src;
              break
            }
          r.local || (r.local = e)
        }
        var p = {
          xdm_c: r.channel,
          xdm_p: 0
        };
        r.local === e ? (r.usePolling = !0,
        r.useParent = !0,
        r.local = n.protocol + "//" + n.host + n.pathname + n.search,
        p.xdm_e = r.local,
        p.xdm_pa = 1) : p.xdm_e = v(r.local),
        r.container && (r.useResize = !1,
        p.xdm_po = 1),
        r.remote = y(r.remote, p)
      } else
        _(r, {
          channel: X.xdm_c,
          remote: X.xdm_e,
          useParent: !w(X.xdm_pa),
          usePolling: !w(X.xdm_po),
          useResize: r.useParent ? !1 : r.useResize
        });
      o = [new I.stack.HashTransport(r), new I.stack.ReliableBehavior({}), new I.stack.QueueBehavior({
        encode: !0,
        maxLength: 4e3 - r.remote.length
      }), new I.stack.VerifyBehavior({
        initiate: r.isHost
      })];
      break;
    case "1":
      o = [new I.stack.PostMessageTransport(r)];
      break;
    case "2":
      r.isHost && (r.remoteHelper = v(r.remoteHelper)),
      o = [new I.stack.NameTransport(r), new I.stack.QueueBehavior, new I.stack.VerifyBehavior({
        initiate: r.isHost
      })];
      break;
    case "3":
      o = [new I.stack.NixTransport(r)];
      break;
    case "4":
      o = [new I.stack.SameOriginTransport(r)];
      break;
    case "5":
      o = [new I.stack.FrameElementTransport(r)];
      break;
    case "6":
      T || l(),
      o = [new I.stack.FlashTransport(r)]
    }
    return o.push(new I.stack.QueueBehavior({
      lazy: r.lazy,
      remove: !0
    })),
    o
  }
  function E(e) {
    for (var t, n = {
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
    }, r = 0, o = e.length; o > r; r++)
      t = e[r],
      _(t, n, !0),
      0 !== r && (t.down = e[r - 1]),
      r !== o - 1 && (t.up = e[r + 1]);
    return t
  }
  function S(e) {
    e.up.down = e.down,
    e.down.up = e.up,
    e.up = e.down = null
  }
  var R, T, M, P, N, C = this, D = Math.floor(1e4 * Math.random()), F = Function.prototype, j = /^((http.?:)\/\/([^:\/\s]+)(:\d+)*)/, L = /[\-\w]+\/\.\.\//, A = /([^:])\/\//g, H = "", I = {}, B = e.easyXDM, J = "easyXDM_", U = !1;
  if (i(e, "addEventListener"))
    P = function(e, t, n) {
      e.addEventListener(t, n, !1)
    }
    ,
    N = function(e, t, n) {
      e.removeEventListener(t, n, !1)
    }
    ;
  else {
    if (!i(e, "attachEvent"))
      throw new Error("Browser not supported");
    P = function(e, t, n) {
      e.attachEvent("on" + t, n)
    }
    ,
    N = function(e, t, n) {
      e.detachEvent("on" + t, n)
    }
  }
  var $, W = !1, q = [];
  if ("readyState"in t ? ($ = t.readyState,
  W = "complete" == $ || ~navigator.userAgent.indexOf("AppleWebKit/") && ("loaded" == $ || "interactive" == $)) : W = !!t.body,
  !W) {
    if (i(e, "addEventListener"))
      P(t, "DOMContentLoaded", u);
    else if (P(t, "readystatechange", function() {
      "complete" == t.readyState && u()
    }),
    t.documentElement.doScroll && e === top) {
      var z = function() {
        if (!W) {
          try {
            t.documentElement.doScroll("left")
          } catch (e) {
            return void r(z, 1)
          }
          u()
        }
      };
      z()
    }
    P(e, "load", u)
  }
  var X = function(e) {
    e = e.substring(1).split("&");
    for (var t, n = {}, r = e.length; r--; )
      t = e[r].split("="),
      n[t[0]] = o(t[1]);
    return n
  }(/xdm_e=/.test(n.search) ? n.search : n.hash)
    , V = function() {
    var e = {}
      , t = {
      a: [1, 2, 3]
    }
      , n = '{"a":[1,2,3]}';
    return "undefined" != typeof JSON && "function" == typeof JSON.stringify && JSON.stringify(t).replace(/\s/g, "") === n ? JSON : (Object.toJSON && Object.toJSON(t).replace(/\s/g, "") === n && (e.stringify = Object.toJSON),
    "function" == typeof String.prototype.evalJSON && (t = n.evalJSON(),
    t.a && 3 === t.a.length && 3 === t.a[2] && (e.parse = function(e) {
      return e.evalJSON()
    }
    )),
    e.stringify && e.parse ? (V = function() {
      return e
    }
    ,
    e) : null)
  };
  _(I, {
    version: "2.4.19.3",
    query: X,
    stack: {},
    apply: _,
    getJSONObject: V,
    whenReady: f,
    noConflict: d
  }),
  I.DomHelper = {
    on: P,
    un: N,
    requiresJSON: function(n) {
      c(e, "JSON") || t.write('<script type="text/javascript" src="' + n + '"></script>')
    }
  },
  function() {
    var e = {};
    I.Fn = {
      set: function(t, n) {
        e[t] = n
      },
      get: function(t, n) {
        if (e.hasOwnProperty(t)) {
          var r = e[t];
          return n && delete e[t],
          r
        }
      }
    }
  }(),
  I.Socket = function(e) {
    var t = E(O(e).concat([{
      incoming: function(t, n) {
        e.onMessage(t, n)
      },
      callback: function(t) {
        e.onReady && e.onReady(t)
      }
    }]))
      , n = m(e.remote);
    this.origin = m(e.remote),
    this.destroy = function() {
      t.destroy()
    }
    ,
    this.postMessage = function(e) {
      t.outgoing(e, n)
    }
    ,
    t.init()
  }
  ,
  I.Rpc = function(e, t) {
    if (t.local)
      for (var n in t.local)
        if (t.local.hasOwnProperty(n)) {
          var r = t.local[n];
          "function" == typeof r && (t.local[n] = {
            method: r
          })
        }
    var o = E(O(e).concat([new I.stack.RpcBehavior(this,t), {
      callback: function(t) {
        e.onReady && e.onReady(t)
      }
    }]));
    this.origin = m(e.remote),
    this.destroy = function() {
      o.destroy()
    }
    ,
    o.init()
  }
  ,
  I.stack.SameOriginTransport = function(e) {
    var t, o, a, i;
    return t = {
      outgoing: function(e, t, n) {
        a(e),
        n && n()
      },
      destroy: function() {
        o && (o.parentNode.removeChild(o),
        o = null)
      },
      onDOMReady: function() {
        i = m(e.remote),
        e.isHost ? (_(e.props, {
          src: y(e.remote, {
            xdm_e: n.protocol + "//" + n.host + n.pathname,
            xdm_c: e.channel,
            xdm_p: 4
          }),
          name: J + e.channel + "_provider"
        }),
        o = x(e),
        I.Fn.set(e.channel, function(e) {
          return a = e,
          r(function() {
            t.up.callback(!0)
          }, 0),
          function(e) {
            t.up.incoming(e, i)
          }
        })) : (a = p().Fn.get(e.channel, !0)(function(e) {
          t.up.incoming(e, i)
        }),
        r(function() {
          t.up.callback(!0)
        }, 0))
      },
      init: function() {
        f(t.onDOMReady, t)
      }
    }
  }
  ,
  I.stack.FlashTransport = function(e) {
    function o(e) {
      r(function() {
        c.up.incoming(e, l)
      }, 0)
    }
    function i(n) {
      var r = e.swf + "?host=" + e.isHost
        , o = "easyXDM_swf_" + Math.floor(1e4 * Math.random());
      I.Fn.set("flash_loaded" + n.replace(/[\-.]/g, "_"), function() {
        I.stack.FlashTransport[n].swf = u = p.firstChild;
        for (var e = I.stack.FlashTransport[n].queue, t = 0; t < e.length; t++)
          e[t]();
        e.length = 0
      }),
      e.swfContainer ? p = "string" == typeof e.swfContainer ? t.getElementById(e.swfContainer) : e.swfContainer : (p = t.createElement("div"),
      _(p.style, M && e.swfNoThrottle ? {
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
      t.body.appendChild(p));
      var i = "callback=flash_loaded" + a(n.replace(/[\-.]/g, "_")) + "&proto=" + C.location.protocol + "&domain=" + a(h(C.location.href)) + "&port=" + a(g(C.location.href)) + "&ns=" + a(H);
      p.innerHTML = "<object height='20' width='20' type='application/x-shockwave-flash' id='" + o + "' data='" + r + "'><param name='allowScriptAccess' value='always'></param><param name='wmode' value='transparent'><param name='movie' value='" + r + "'></param><param name='flashvars' value='" + i + "'></param><embed type='application/x-shockwave-flash' FlashVars='" + i + "' allowScriptAccess='always' wmode='transparent' src='" + r + "' height='1' width='1'></embed></object>"
    }
    var c, s, l, u, p;
    return c = {
      outgoing: function(t, n, r) {
        u.postMessage(e.channel, t.toString()),
        r && r()
      },
      destroy: function() {
        try {
          u.destroyChannel(e.channel)
        } catch (t) {}
        u = null,
        s && (s.parentNode.removeChild(s),
        s = null)
      },
      onDOMReady: function() {
        l = e.remote,
        I.Fn.set("flash_" + e.channel + "_init", function() {
          r(function() {
            c.up.callback(!0)
          })
        }),
        I.Fn.set("flash_" + e.channel + "_onMessage", o),
        e.swf = v(e.swf);
        var t = h(e.swf)
          , a = function() {
          I.stack.FlashTransport[t].init = !0,
          u = I.stack.FlashTransport[t].swf,
          u.createChannel(e.channel, e.secret, m(e.remote), e.isHost),
          e.isHost && (M && e.swfNoThrottle && _(e.props, {
            position: "fixed",
            right: 0,
            top: 0,
            height: "20px",
            width: "20px"
          }),
          _(e.props, {
            src: y(e.remote, {
              xdm_e: m(n.href),
              xdm_c: e.channel,
              xdm_p: 6,
              xdm_s: e.secret
            }),
            name: J + e.channel + "_provider"
          }),
          s = x(e))
        };
        I.stack.FlashTransport[t] && I.stack.FlashTransport[t].init ? a() : I.stack.FlashTransport[t] ? I.stack.FlashTransport[t].queue.push(a) : (I.stack.FlashTransport[t] = {
          queue: [a]
        },
        i(t))
      },
      init: function() {
        f(c.onDOMReady, c)
      }
    }
  }
  ,
  I.stack.PostMessageTransport = function(t) {
    function o(e) {
      if (e.origin)
        return m(e.origin);
      if (e.uri)
        return m(e.uri);
      if (e.domain)
        return n.protocol + "//" + e.domain;
      throw "Unable to retrieve the origin of the event"
    }
    function a(e) {
      var n = o(e);
      n == l && e.data.substring(0, t.channel.length + 1) == t.channel + " " && i.up.incoming(e.data.substring(t.channel.length + 1), n)
    }
    var i, c, s, l;
    return i = {
      outgoing: function(e, n, r) {
        s.postMessage(t.channel + " " + e, n || l),
        r && r()
      },
      destroy: function() {
        N(e, "message", a),
        c && (s = null,
        c.parentNode.removeChild(c),
        c = null)
      },
      onDOMReady: function() {
        if (l = m(t.remote),
        t.isHost) {
          var o = function(n) {
            n.data == t.channel + "-ready" && (s = "postMessage"in c.contentWindow ? c.contentWindow : c.contentWindow.document,
            N(e, "message", o),
            P(e, "message", a),
            r(function() {
              i.up.callback(!0)
            }, 0))
          };
          P(e, "message", o),
          _(t.props, {
            src: y(t.remote, {
              xdm_e: m(n.href),
              xdm_c: t.channel,
              xdm_p: 1
            }),
            name: J + t.channel + "_provider"
          }),
          c = x(t)
        } else
          P(e, "message", a),
          s = "postMessage"in e.parent ? e.parent : e.parent.document,
          s.postMessage(t.channel + "-ready", l),
          r(function() {
            i.up.callback(!0)
          }, 0)
      },
      init: function() {
        f(i.onDOMReady, i)
      }
    }
  }
  ,
  I.stack.FrameElementTransport = function(o) {
    var a, i, c, s;
    return a = {
      outgoing: function(e, t, n) {
        c.call(this, e),
        n && n()
      },
      destroy: function() {
        i && (i.parentNode.removeChild(i),
        i = null)
      },
      onDOMReady: function() {
        s = m(o.remote),
        o.isHost ? (_(o.props, {
          src: y(o.remote, {
            xdm_e: m(n.href),
            xdm_c: o.channel,
            xdm_p: 5
          }),
          name: J + o.channel + "_provider"
        }),
        i = x(o),
        i.fn = function(e) {
          return delete i.fn,
          c = e,
          r(function() {
            a.up.callback(!0)
          }, 0),
          function(e) {
            a.up.incoming(e, s)
          }
        }
        ) : (t.referrer && m(t.referrer) != X.xdm_e && (e.top.location = X.xdm_e),
        c = e.frameElement.fn(function(e) {
          a.up.incoming(e, s)
        }),
        a.up.callback(!0))
      },
      init: function() {
        f(a.onDOMReady, a)
      }
    }
  }
  ,
  I.stack.NameTransport = function(e) {
    function t(t) {
      var n = e.remoteHelper + (c ? "#_3" : "#_2") + e.channel;
      s.contentWindow.sendMessage(t, n)
    }
    function n() {
      c ? 2 !== ++u && c || i.up.callback(!0) : (t("ready"),
      i.up.callback(!0))
    }
    function o(e) {
      i.up.incoming(e, d)
    }
    function a() {
      p && r(function() {
        p(!0)
      }, 0)
    }
    var i, c, s, l, u, p, d, h;
    return i = {
      outgoing: function(e, n, r) {
        p = r,
        t(e)
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
        d = m(e.remote),
        e.local = v(e.local),
        c ? (I.Fn.set(e.channel, function(t) {
          c && "ready" === t && (I.Fn.set(e.channel, o),
          n())
        }),
        h = y(e.remote, {
          xdm_e: e.local,
          xdm_c: e.channel,
          xdm_p: 2
        }),
        _(e.props, {
          src: h + "#" + e.channel,
          name: J + e.channel + "_provider"
        }),
        l = x(e)) : (e.remoteHelper = e.remote,
        I.Fn.set(e.channel, o));
        var t = function() {
          var o = s || this;
          N(o, "load", t),
          I.Fn.set(e.channel + "_load", a),
          function i() {
            "function" == typeof o.contentWindow.sendMessage ? n() : r(i, 50)
          }()
        };
        s = x({
          props: {
            src: e.local + "#_4" + e.channel
          },
          onLoad: t
        })
      },
      init: function() {
        f(i.onDOMReady, i)
      }
    }
  }
  ,
  I.stack.HashTransport = function(t) {
    function n(e) {
      if (g) {
        var n = t.remote + "#" + d++ + "_" + e;
        (s || !v ? g.contentWindow : g).location = n
      }
    }
    function o(e) {
      p = e,
      c.up.incoming(p.substring(p.indexOf("_") + 1), y)
    }
    function a() {
      if (h) {
        var e = h.location.href
          , t = ""
          , n = e.indexOf("#");
        -1 != n && (t = e.substring(n)),
        t && t != p && o(t)
      }
    }
    function i() {
      l = setInterval(a, u)
    }
    var c, s, l, u, p, d, h, g, v, y;
    return c = {
      outgoing: function(e) {
        n(e)
      },
      destroy: function() {
        e.clearInterval(l),
        (s || !v) && g.parentNode.removeChild(g),
        g = null
      },
      onDOMReady: function() {
        if (s = t.isHost,
        u = t.interval,
        p = "#" + t.channel,
        d = 0,
        v = t.useParent,
        y = m(t.remote),
        s) {
          if (_(t.props, {
            src: t.remote,
            name: J + t.channel + "_provider"
          }),
          v)
            t.onLoad = function() {
              h = e,
              i(),
              c.up.callback(!0)
            }
            ;
          else {
            var n = 0
              , o = t.delay / 50;
            !function a() {
              if (++n > o)
                throw new Error("Unable to reference listenerwindow");
              try {
                h = g.contentWindow.frames[J + t.channel + "_consumer"]
              } catch (e) {}
              h ? (i(),
              c.up.callback(!0)) : r(a, 50)
            }()
          }
          g = x(t)
        } else
          h = e,
          i(),
          v ? (g = parent,
          c.up.callback(!0)) : (_(t, {
            props: {
              src: t.remote + "#" + t.channel + new Date,
              name: J + t.channel + "_consumer"
            },
            onLoad: function() {
              c.up.callback(!0)
            }
          }),
          g = x(t))
      },
      init: function() {
        f(c.onDOMReady, c)
      }
    }
  }
  ,
  I.stack.ReliableBehavior = function() {
    var e, t, n = 0, r = 0, o = "";
    return e = {
      incoming: function(a, i) {
        var c = a.indexOf("_")
          , s = a.substring(0, c).split(",");
        a = a.substring(c + 1),
        s[0] == n && (o = "",
        t && t(!0)),
        a.length > 0 && (e.down.outgoing(s[1] + "," + n + "_" + o, i),
        r != s[1] && (r = s[1],
        e.up.incoming(a, i)))
      },
      outgoing: function(a, i, c) {
        o = a,
        t = c,
        e.down.outgoing(r + "," + ++n + "_" + a, i)
      }
    }
  }
  ,
  I.stack.QueueBehavior = function(e) {
    function t() {
      if (e.remove && 0 === c.length)
        return void S(n);
      if (!s && 0 !== c.length && !i) {
        s = !0;
        var o = c.shift();
        n.down.outgoing(o.data, o.origin, function(e) {
          s = !1,
          o.callback && r(function() {
            o.callback(e)
          }, 0),
          t()
        })
      }
    }
    var n, i, c = [], s = !0, l = "", u = 0, f = !1, p = !1;
    return n = {
      init: function() {
        w(e) && (e = {}),
        e.maxLength && (u = e.maxLength,
        p = !0),
        e.lazy ? f = !0 : n.down.init()
      },
      callback: function(e) {
        s = !1;
        var r = n.up;
        t(),
        r.callback(e)
      },
      incoming: function(t, r) {
        if (p) {
          var a = t.indexOf("_")
            , i = parseInt(t.substring(0, a), 10);
          l += t.substring(a + 1),
          0 === i && (e.encode && (l = o(l)),
          n.up.incoming(l, r),
          l = "")
        } else
          n.up.incoming(t, r)
      },
      outgoing: function(r, o, i) {
        e.encode && (r = a(r));
        var s, l = [];
        if (p) {
          for (; 0 !== r.length; )
            s = r.substring(0, u),
            r = r.substring(s.length),
            l.push(s);
          for (; s = l.shift(); )
            c.push({
              data: l.length + "_" + s,
              origin: o,
              callback: 0 === l.length ? i : null
            })
        } else
          c.push({
            data: r,
            origin: o,
            callback: i
          });
        f ? n.down.init() : t()
      },
      destroy: function() {
        i = !0,
        n.down.destroy()
      }
    }
  }
  ,
  I.stack.VerifyBehavior = function(e) {
    function t() {
      r = Math.random().toString(16).substring(2),
      n.down.outgoing(r)
    }
    var n, r, o;
    return n = {
      incoming: function(a, i) {
        var c = a.indexOf("_");
        -1 === c ? a === r ? n.up.callback(!0) : o || (o = a,
        e.initiate || t(),
        n.down.outgoing(a)) : a.substring(0, c) === o && n.up.incoming(a.substring(c + 1), i)
      },
      outgoing: function(e, t, o) {
        n.down.outgoing(r + "_" + e, t, o)
      },
      callback: function() {
        e.initiate && t()
      }
    }
  }
  ,
  I.stack.RpcBehavior = function(e, t) {
    function n(e) {
      e.jsonrpc = "2.0",
      a.down.outgoing(i.stringify(e))
    }
    function r(e, t) {
      var r = Array.prototype.slice;
      return function() {
        var o, a = arguments.length, i = {
          method: t
        };
        a > 0 && "function" == typeof arguments[a - 1] ? (a > 1 && "function" == typeof arguments[a - 2] ? (o = {
          success: arguments[a - 2],
          error: arguments[a - 1]
        },
        i.params = r.call(arguments, 0, a - 2)) : (o = {
          success: arguments[a - 1]
        },
        i.params = r.call(arguments, 0, a - 1)),
        l["" + ++c] = o,
        i.id = c) : i.params = r.call(arguments, 0),
        e.namedParams && 1 === i.params.length && (i.params = i.params[0]),
        n(i)
      }
    }
    function o(e, t, r, o) {
      if (!r)
        return void (t && n({
          id: t,
          error: {
            code: -32601,
            message: "Procedure not found."
          }
        }));
      var a, i;
      t ? (a = function(e) {
        a = F,
        n({
          id: t,
          result: e
        })
      }
      ,
      i = function(e, r) {
        i = F;
        var o = {
          id: t,
          error: {
            code: -32099,
            message: e
          }
        };
        r && (o.error.data = r),
        n(o)
      }
      ) : a = i = F,
      s(o) || (o = [o]);
      try {
        var c = r.method.apply(r.scope, o.concat([a, i]));
        w(c) || a(c)
      } catch (l) {
        i(l.message)
      }
    }
    var a, i = t.serializer || V(), c = 0, l = {};
    return a = {
      incoming: function(e) {
        var r = i.parse(e);
        if (r.method)
          t.handle ? t.handle(r, n) : o(r.method, r.id, t.local[r.method], r.params);
        else {
          var a = l[r.id];
          r.error ? a.error && a.error(r.error) : a.success && a.success(r.result),
          delete l[r.id]
        }
      },
      init: function() {
        if (t.remote)
          for (var n in t.remote)
            t.remote.hasOwnProperty(n) && (e[n] = r(t.remote[n], n));
        a.down.init()
      },
      destroy: function() {
        for (var n in t.remote)
          t.remote.hasOwnProperty(n) && e.hasOwnProperty(n) && delete e[n];
        a.down.destroy()
      }
    }
  }
  ,
  C.easyXDM = I
}(window, document, location, window.setTimeout, decodeURIComponent, encodeURIComponent),
function(e) {
  if ("function" == typeof define && define.amd) {
    if ("undefined" != typeof requirejs) {
      var t = requirejs
        , n = "[history" + (new Date).getTime() + "]"
        , r = t.onError;
      e.toString = function() {
        return n
      }
      ,
      t.onError = function(e) {
        -1 === e.message.indexOf(n) && r.call(t, e)
      }
    }
    define([], e)
  }
  return "object" != typeof exports || "undefined" == typeof module ? e() : void (module.exports = e())
}(function() {
  function e() {}
  function t(e, n, r) {
    var o = /(?:([a-zA-Z0-9\-]+\:))?(?:\/\/(?:[^@]*@)?([^\/:\?#]+)(?::([0-9]+))?)?([^\?#]*)(?:(\?[^#]+)|\?)?(?:(#.*))?/;
    if (null == e || "" === e || n)
      e = n ? e : O.href,
      (!M || r) && (e = e.replace(/^[^#]*/, "") || "#",
      e = O.protocol.replace(/:.*$|$/, ":") + "//" + O.host + B.basepath + e.replace(new RegExp("^#[/]?(?:" + B.type + ")?"), ""));
    else {
      var a = t()
        , i = _.getElementsByTagName("base")[0];
      !r && i && i.getAttribute("href") && (i.href = i.href,
      a = t(i.href, null, !0));
      var c = a._pathname
        , s = a._protocol;
      e = "" + e,
      e = /^(?:\w+\:)?\/\//.test(e) ? 0 === e.indexOf("/") ? s + e : e : s + "//" + a._host + (0 === e.indexOf("/") ? e : 0 === e.indexOf("?") ? c + e : 0 === e.indexOf("#") ? c + a._search + e : c.replace(/[^\/]+$/g, "") + e)
    }
    U.href = e;
    var l = o.exec(U.href)
      , u = l[2] + (l[3] ? ":" + l[3] : "")
      , f = l[4] || "/"
      , p = l[5] || ""
      , d = "#" === l[6] ? "" : l[6] || ""
      , h = f + p + d
      , g = f.replace(new RegExp("^" + B.basepath,"i"), B.type) + p;
    return {
      _href: l[1] + "//" + u + h,
      _protocol: l[1],
      _host: u,
      _hostname: l[2],
      _port: l[3] || "",
      _pathname: f,
      _search: p,
      _hash: d,
      _relative: h,
      _nohash: g,
      _special: g + d
    }
  }
  function n() {
    var e = y.navigator.userAgent;
    return -1 === e.indexOf("Android 2.") && -1 === e.indexOf("Android 4.0") || -1 === e.indexOf("Mobile Safari") || -1 !== e.indexOf("Chrome") || -1 !== e.indexOf("Windows Phone") ? !!R : !1
  }
  function r() {
    var e;
    try {
      e = y.sessionStorage,
      e.setItem(J + "t", "1"),
      e.removeItem(J + "t")
    } catch (t) {
      e = {
        getItem: function(e) {
          var t = _.cookie.split(e + "=");
          return t.length > 1 && t.pop().split(";").shift() || "null"
        },
        setItem: function(e) {
          var t = {};
          (t[O.href] = S.state) && (_.cookie = e + "=" + k.stringify(t))
        }
      }
    }
    try {
      V = k.parse(e.getItem(J)) || {}
    } catch (t) {
      V = {}
    }
    A(D + "unload", function() {
      e.setItem(J, k.stringify(V))
    }, !1)
  }
  function o(t, n, r, o) {
    var a = 0;
    r || (r = {
      set: e
    },
    a = 1);
    var i = !r.set
      , c = !r.get
      , s = {
      configurable: !0,
      set: function() {
        i = 1
      },
      get: function() {
        c = 1
      }
    };
    try {
      N(t, n, s),
      t[n] = t[n],
      N(t, n, r)
    } catch (l) {}
    if (!(i && c || (t.__defineGetter__ && (t.__defineGetter__(n, s.get),
    t.__defineSetter__(n, s.set),
    t[n] = t[n],
    r.get && t.__defineGetter__(n, r.get),
    r.set && t.__defineSetter__(n, r.set)),
    i && c))) {
      if (a)
        return !1;
      if (t === y) {
        try {
          var u = t[n];
          t[n] = null
        } catch (l) {}
        if ("execScript"in y)
          y.execScript("Public " + n, "VBScript"),
          y.execScript("var " + n + ";", "JavaScript");
        else
          try {
            N(t, n, {
              value: e
            })
          } catch (l) {
            "onpopstate" === n && (A("popstate", r = function() {
              H("popstate", r, !1);
              var e = t.onpopstate;
              t.onpopstate = null,
              setTimeout(function() {
                t.onpopstate = e
              }, 1)
            }
            , !1),
            q = 0)
          }
        t[n] = u
      } else
        try {
          try {
            var f = x.create(t);
            N(x.getPrototypeOf(f) === t ? f : t, n, r);
            for (var p in t)
              "function" == typeof t[p] && (f[p] = t[p].bind(t));
            try {
              o.call(f, f, t)
            } catch (l) {}
            t = f
          } catch (l) {
            N(t.constructor.prototype, n, r)
          }
        } catch (l) {
          return !1
        }
    }
    return t
  }
  function a(e, t, n) {
    return n = n || {},
    e = e === et ? O : e,
    n.set = n.set || function(n) {
      e[t] = n
    }
    ,
    n.get = n.get || function() {
      return e[t]
    }
    ,
    n
  }
  function i(e, t, n) {
    e in G ? G[e].push(t) : arguments.length > 3 ? A(e, t, n, arguments[3]) : A(e, t, n)
  }
  function c(e, t, n) {
    var r = G[e];
    if (r) {
      for (var o = r.length; o--; )
        if (r[o] === t) {
          r.splice(o, 1);
          break
        }
    } else
      H(e, t, n)
  }
  function s(t, n) {
    var r = ("" + ("string" == typeof t ? t : t.type)).replace(/^on/, "")
      , a = G[r];
    if (a) {
      if (n = "string" == typeof t ? n : t,
      null == n.target)
        for (var i = ["target", "currentTarget", "srcElement", "type"]; t = i.pop(); )
          n = o(n, t, {
            get: "type" === t ? function() {
              return r
            }
            : function() {
              return y
            }
          });
      q && (("popstate" === r ? y.onpopstate : y.onhashchange) || e).call(y, n);
      for (var c = 0, s = a.length; s > c; c++)
        a[c].call(y, n);
      return !0
    }
    return I(t, n)
  }
  function l() {
    var e = _.createEvent ? _.createEvent("Event") : _.createEventObject();
    e.initEvent ? e.initEvent("popstate", !1, !1) : e.type = "popstate",
    e.state = S.state,
    s(e)
  }
  function u() {
    z && (z = !1,
    l())
  }
  function f(e, n, r, o) {
    if (M)
      $ = O.href;
    else {
      0 === X && (X = 2);
      var a = t(n, 2 === X && -1 !== ("" + n).indexOf("#"));
      a._relative !== t()._relative && ($ = o,
      r ? O.replace("#" + a._special) : O.hash = a._special)
    }
    !P && e && (V[O.href] = e),
    z = !1
  }
  function p(e) {
    var n = $;
    if ($ = O.href,
    n) {
      W !== O.href && l(),
      e = e || y.event;
      var r = t(n, !0)
        , o = t();
      e.oldURL || (e.oldURL = r._href,
      e.newURL = o._href),
      r._hash !== o._hash && s(e)
    }
  }
  function d(e) {
    setTimeout(function() {
      A("popstate", function(e) {
        W = O.href,
        P || (e = o(e, "state", {
          get: function() {
            return S.state
          }
        })),
        s(e)
      }, !1)
    }, 0),
    !M && e !== !0 && "location"in S && (m(C.hash),
    u())
  }
  function h(e) {
    for (; e; ) {
      if ("A" === e.nodeName)
        return e;
      e = e.parentNode
    }
  }
  function g(e) {
    var n = e || y.event
      , r = h(n.target || n.srcElement)
      , o = "defaultPrevented"in n ? n.defaultPrevented : n.returnValue === !1;
    if (r && "A" === r.nodeName && !o) {
      var a = t()
        , i = t(r.getAttribute("href", 2))
        , c = a._href.split("#").shift() === i._href.split("#").shift();
      c && i._hash && (a._hash !== i._hash && (C.hash = i._hash),
      m(i._hash),
      n.preventDefault ? n.preventDefault() : n.returnValue = !1)
    }
  }
  function m(e) {
    var t = _.getElementById(e = (e || "").replace(/^#/, ""));
    if (t && t.id === e && "A" === t.nodeName) {
      var n = t.getBoundingClientRect();
      y.scrollTo(b.scrollLeft || 0, n.top + (b.scrollTop || 0) - (b.clientTop || 0))
    }
  }
  function v() {
    var e = _.getElementsByTagName("script")
      , n = (e[e.length - 1] || {}).src || ""
      , i = -1 !== n.indexOf("?") ? n.split("?").pop() : "";
    i.replace(/(\w+)(?:=([^&]*))?/g, function(e, t, n) {
      B[t] = (n || "").replace(/^(0|false)$/, "")
    }),
    A(D + "hashchange", p, !1);
    var c = [et, C, K, y, Y, S];
    P && delete Y.state;
    for (var s = 0; s < c.length; s += 2)
      for (var l in c[s])
        if (c[s].hasOwnProperty(l))
          if ("object" != typeof c[s][l])
            c[s + 1][l] = c[s][l];
          else {
            var u = a(c[s], l, c[s][l]);
            if (!o(c[s + 1], l, u, function(e, t) {
              t === S && (y.history = S = c[s + 1] = e)
            }))
              return H(D + "hashchange", p, !1),
              !1;
            c[s + 1] === y && (G[l] = G[l.substr(2)] = [])
          }
    return S.setup(),
    B.redirect && S.redirect(),
    B.init && (X = 1),
    !P && k && r(),
    M || _[F](D + "click", g, !1),
    "complete" === _.readyState ? d(!0) : (M || t()._relative === B.basepath || (z = !0),
    A(D + "load", d, !1)),
    !0
  }
  var y = ("object" == typeof window ? window : this) || {};
  if (!y.history || "emulate"in y.history)
    return y.history;
  var w, _ = y.document, b = _.documentElement, x = y.Object, k = y.JSON, O = y.location, E = y.history, S = E, R = E.pushState, T = E.replaceState, M = n(), P = "state"in E, N = x.defineProperty, C = o({}, "t") ? {} : _.createElement("a"), D = "", F = y.addEventListener ? "addEventListener" : (D = "on") && "attachEvent", j = y.removeEventListener ? "removeEventListener" : "detachEvent", L = y.dispatchEvent ? "dispatchEvent" : "fireEvent", A = y[F], H = y[j], I = y[L], B = {
    basepath: "/",
    redirect: 0,
    type: "/",
    init: 0
  }, J = "__historyAPI__", U = _.createElement("a"), $ = O.href, W = "", q = 1, z = !1, X = 0, V = {}, G = {}, Q = _.title, K = {
    onhashchange: null,
    onpopstate: null
  }, Z = function(e, t) {
    var n = y.history !== E;
    n && (y.history = E),
    e.apply(E, t),
    n && (y.history = S)
  }, Y = {
    setup: function(e, t, n) {
      B.basepath = ("" + (null == e ? B.basepath : e)).replace(/(?:^|\/)[^\/]*$/, "/"),
      B.type = null == t ? B.type : t,
      B.redirect = null == n ? B.redirect : !!n
    },
    redirect: function(e, n) {
      if (S.setup(n, e),
      n = B.basepath,
      y.top == y.self) {
        var r = t(null, !1, !0)._relative
          , o = O.pathname + O.search;
        M ? (o = o.replace(/([^\/])$/, "$1/"),
        r != n && new RegExp("^" + n + "$","i").test(o) && O.replace(r)) : o != n && (o = o.replace(/([^\/])\?/, "$1/?"),
        new RegExp("^" + n,"i").test(o) && O.replace(n + "#" + o.replace(new RegExp("^" + n,"i"), B.type) + O.hash))
      }
    },
    pushState: function(e, t, n) {
      var r = _.title;
      null != Q && (_.title = Q),
      R && Z(R, arguments),
      f(e, n),
      _.title = r,
      Q = t
    },
    replaceState: function(e, t, n) {
      var r = _.title;
      null != Q && (_.title = Q),
      delete V[O.href],
      T && Z(T, arguments),
      f(e, n, !0),
      _.title = r,
      Q = t
    },
    location: {
      set: function(e) {
        0 === X && (X = 1),
        y.location = e
      },
      get: function() {
        return 0 === X && (X = 1),
        C
      }
    },
    state: {
      get: function() {
        return "object" == typeof V[O.href] ? k.parse(k.stringify(V[O.href])) : "undefined" != typeof V[O.href] ? V[O.href] : null
      }
    }
  }, et = {
    assign: function(e) {
      M || 0 !== ("" + e).indexOf("#") ? O.assign(e) : f(null, e)
    },
    reload: function(e) {
      O.reload(e)
    },
    replace: function(e) {
      M || 0 !== ("" + e).indexOf("#") ? O.replace(e) : f(null, e, !0)
    },
    toString: function() {
      return this.href
    },
    origin: {
      get: function() {
        return void 0 !== w ? w : O.origin ? O.origin : O.protocol + "//" + O.hostname + (O.port ? ":" + O.port : "")
      },
      set: function(e) {
        w = e
      }
    },
    href: M ? null : {
      get: function() {
        return t()._href
      }
    },
    protocol: null,
    host: null,
    hostname: null,
    port: null,
    pathname: M ? null : {
      get: function() {
        return t()._pathname
      }
    },
    search: M ? null : {
      get: function() {
        return t()._search
      }
    },
    hash: M ? null : {
      set: function(e) {
        f(null, ("" + e).replace(/^(#|)/, "#"), !1, $)
      },
      get: function() {
        return t()._hash
      }
    }
  };
  return v() ? (S.emulate = !M,
  y[F] = i,
  y[j] = c,
  y[L] = s,
  S) : void 0
});
var widgetyStateRegex = /widgety-state=([^&]+)/
  , bindStateUpdate = function(e) {
  var t = window.history.location || window.location
    , n = function(n) {
    if (n.origin === e && "stateUpdate" === n.data.type) {
      var r = t.href
        , o = "widgety-state=" + encodeURIComponent(n.data.state);
      t.search.match(widgetyStateRegex) ? r = r.replace(widgetyStateRegex, o) : (0 === t.search.length && (r += "?"),
      r += o),
      r !== t.href && history.replaceState(null, null, r)
    }
  };
  window.addEventListener ? window.addEventListener("message", n, !1) : window.attachEvent && window.attachEvent("onmessage", n)
}
  , setInitialState = function(e, t) {
  var n = location.search.match(widgetyStateRegex);
  n && setTimeout(function() {
    e.setAttribute("src", t + decodeURIComponent(n[1]))
  }, 100)
}
  , setParentData = function(e, t) {
  e.contentWindow.postMessage({
    type: "setParentOrigin"
  }, t)
};
bindDeepLinking = function(e, t) {
  setInitialState(e, t),
  setParentData(e, t),
  bindStateUpdate(t)
}
;
var widgets = document.querySelectorAll('iframe[src*="widgets/"]'), script = document.querySelector('script[src*="widgety_iframe"]'), i, len;
for (i = 0,
len = widgets.length; len > i; i++) {
  var widget = widgets[i]
    , src = script.getAttribute("src").split("/");
  bindDeepLinking(widget, src[0] + "//" + src[2])
}
