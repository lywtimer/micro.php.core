<?php

    namespace mszl\core\tools;

    use Exception;
    use mszl\core\traits\ArrayAccessTrait;

    class Entity implements \ArrayAccess
    {
        use ArrayAccessTrait;

        public function encode(): bool|string
        {
            return json_encode($this, JSON_UNESCAPED_UNICODE);
        }

        /**
         * @throws Exception
         */
        public static function decode($jsonData): Entity
        {
            $decodeData = json_decode($jsonData, true);
            if (json_last_error()) {
                throw new Exception("decode error : " . json_last_error_msg());
            }
            return new self($decodeData);
        }
    }