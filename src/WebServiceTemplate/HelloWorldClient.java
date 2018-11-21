package WebServiceTemplate;

import java.net.URL;
import javax.xml.namespace.QName;
import javax.xml.ws.Service;

public class HelloWorldClient{

    public static void main(String[] args) throws Exception {

        URL url = new URL("http://localhost:9000/HelloWorldService?wsdl");

        //1st argument service URI, refer to wsdl document above
        //2nd argument is service name, refer to wsdl document above
        QName serviceName = new QName("http://WebServiceTemplate/", "HelloWorldImplService");
        Service service = Service.create(url, serviceName);

        QName portName = new QName("http://WebServiceTemplate/", "HelloWorldImplPort");
        HelloWorld hello = service.getPort(portName, HelloWorld.class);

        System.out.println("Client side : "+ hello.sayHelloWorldFrom("Anavel"));

        System.out.println("Client side : "+ hello.sayHelloWorldFrom("Charlotte"));

    }

}