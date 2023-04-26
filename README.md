# memory

- 设计思想
  - 依赖倒置原则
- 探索 web 框架

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


