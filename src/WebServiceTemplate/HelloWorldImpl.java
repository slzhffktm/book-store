package WebServiceTemplate;

import javax.jws.WebService;
import javax.xml.ws.Endpoint;

@WebService()
public class HelloWorldImpl implements HelloWorld {

    public String sayHelloWorldFrom(String from) {
        String result = "Hello world, from " + from;
        System.out.println("server side : "+ result);
        return result;
    }


    // Publisher part
    public static void main(String[] argv) {
        Object implementor = new HelloWorldImpl();
        String address = "http://localhost:9000/HelloWorldService";
        Endpoint.publish(address, implementor);
    }
}
