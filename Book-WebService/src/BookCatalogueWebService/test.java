package BookCatalogueWebService;

import com.sun.xml.internal.ws.api.databinding.SoapBodyStyle;

import javax.xml.soap.*;

public class test {

    public static void main(String[] argv) throws  Exception {


        MessageFactory mf = MessageFactory.newInstance();
        SOAPMessage message = mf.createMessage();
        SOAPPart part = message.getSOAPPart();
        SOAPEnvelope env = part.getEnvelope();
        SOAPHeader head = env.getHeader();
        SOAPBody body = env.getBody();


        System.out.println(message);
        System.out.println(part);
        System.out.println(env);
        System.out.println(head);
        System.out.println(body);

        message.writeTo(System.out);



    }
}
