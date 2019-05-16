public class XorEncrypt {
    public static String encrypt(final byte[] input, final byte[] secret) {
        final byte[] output = new byte[input.length];
        if (secret.length == 0) {
            throw new IllegalArgumentException("empty security key");
        }
        int spos = 0;
        for (int pos = 0; pos < input.length; ++pos) {
            output[pos] = (byte) (input[pos] ^ secret[spos]);
            ++spos;
            if (spos >= secret.length) {
                spos = 0;
            }
        }
        return new sun.misc.BASE64Encoder().encode(output);
    }

    public static String decrypt(String s, final byte[] key) {
        int spos = 0;
        try {
            byte[] output = (new sun.misc.BASE64Decoder().decodeBuffer(s));
            for (int pos = 0; pos < output.length; ++pos) {
                output[pos] = (byte) (output[pos] ^ key[spos]);
                ++spos;
                if (spos >= key.length) {
                    spos = 0;
                }
            }
            return new String(output, "UTF-8");
        } catch (Exception e) {

        }
        return null;
    }
}
