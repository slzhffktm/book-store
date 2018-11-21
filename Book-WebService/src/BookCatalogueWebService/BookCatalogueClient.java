package BookCatalogueWebService;

import org.json.JSONObject;

import java.net.URL;
import javax.xml.namespace.QName;
import javax.xml.ws.Service;

public class BookCatalogueClient {

    public static void main(String[] args) throws Exception {

        URL url = new URL("http://localhost:9000/BookCatalogueWebService?wsdl");

        //1st argument service URI, refer to wsdl document above
        //2nd argument is service name, refer to wsdl document above
        QName serviceName = new QName("http://BookCatalogueWebService/", "BookCatalogueImplService");
        Service service = Service.create(url, serviceName);

        QName portName = new QName("http://BookCatalogueWebService/", "BookCatalogueImplPort");
        BookCatalogue catalogue = service.getPort(portName, BookCatalogue.class);

        System.out.println("Testing search function");
        String result = catalogue.searchBook("Anavel");
        JSONObject jsonResult = new JSONObject(result);
//        System.out.println(jsonResult);

        System.out.println("Testing get book details function");
        String book = catalogue.getBookDetail("hjEFCAAAQBAJ");
        JSONObject jsonBook = new JSONObject(book);
//        System.out.println(jsonBook);

        System.out.println("Testing buy book function");
        boolean res = catalogue.buyBook(jsonBook.getString("ID").toString(),"Horror",5);
								res = catalogue.buyBook(jsonBook.getString("ID").toString(),"Horror",3);
//        jsonResult = new JSONObject(result);
//        System.out.println(res);
    }
}