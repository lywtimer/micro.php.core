# memory



type Context struct {
W                     http.ResponseWriter
R                     *http.Request
NodeRouterName        string
RequestMethod         string
engine                *Engine
queryCache            url.Values
DisallowUnknownFields bool
IsValidate            bool
StructValidator       validator.StructValidator
StatusCode            int
Logger                *msLog.Logger
Keys                  map[string]any
mu                    sync.RWMutex
sameSite              http.SameSite
}


type Engine struct {
router
Logger       *mslog.Logger
middlewares  []MiddlewareFunc
errorHandler ErrorHandler
register     register.MsRegister
}
