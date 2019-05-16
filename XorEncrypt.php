<?php
class XorEncrypt
{
    /**
     * Encrypts a message using the XOR logic gate
     * 
     * @param string $input The string to encrypt
     * @param string $key The key used to encrypt the message
     * 
     * @return string $cypher the encrypted value for the message
     */
    public static function encrypt($input, $key)
    {
        $output = [];
        if (strlen($key) == 0) {
            throw new IllegalArgumentException("empty security key");
        }
        $spos = 0;
        for ($pos = 0; $pos < strlen($input); ++$pos) {
            $output[$pos] = $input[$pos] ^ $key[$spos];
            ++$spos;
            if ($spos >= strlen($key)) {
                $spos = 0;
            }
        }
        return base64_encode(join("", $output));
    }

    /**
     * Decrypts a message using the XOR logic gate
     * 
     * @param string $cypher the string to decrypt
     * @param string $key the key used to encrypt the string
     * 
     * @return string $clearString the decrypted string
     */
    public static function decrypt($cypher, $key)
    {
        $spos = 0;
        try {
            $out = str_split(base64_decode($cypher), 1);
            for ($pos = 0; $pos < strlen($cypher); $pos++) {
                if (array_key_exists($pos, $out)) {
                    $out[$pos] = ($out[$pos] ^ $key[$spos]);
                    ++$spos;
                    if ($spos >= strlen($key)) {
                        $spos = 0;
                    }
                }
            }
            return utf8_encode(join("", $out));
        } catch (Exception $e) {
            echo $e;
        }
        return null;
    }
}
