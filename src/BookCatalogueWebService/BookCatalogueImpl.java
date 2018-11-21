package BookCatalogueWebService;

import org.json.JSONObject;

import javax.jws.WebService;
import javax.xml.ws.Endpoint;

@WebService()
public class BookCatalogueImpl implements BookCatalogue {

    private GoogleBookAPI googleBookAPI = new GoogleBookAPI();
    private GoogleBookResultHandler resultHandler = new GoogleBookResultHandler();

    public JSONObject searchBook(String title) throws Exception{

        String result = googleBookAPI.searchBook(title);
        return resultHandler.parseSearch(result);
    }

    public JSONObject getBookDetail(String bookId) throws Exception{
        String result = googleBookAPI.getBookDetail(bookId);
        return resultHandler.parseBookDetail(result);
    }

    // Publisher part
    public static void main(String[] argv) {
        Object implementor = new BookCatalogueImpl();
        String address = "http://localhost:9000/BookCatalogueWebService";
        Endpoint.publish(address, implementor);

        System.out.println("Service is up !");
    }
}
