package BookCatalogueWebService;

import javax.jws.WebService;
import javax.xml.ws.Endpoint;

@WebService()
public class BookCatalogueImpl implements BookCatalogue {

    private GoogleBookAPI googleBookAPI = new GoogleBookAPI();
    private GoogleBookResultHandler resultHandler = new GoogleBookResultHandler();

    public String searchBook(String title) throws Exception{
        String result = googleBookAPI.searchBook(title);
        return resultHandler.parseSearch(result);
    }

    public String getBookDetail(String bookId) throws Exception{
        String result = googleBookAPI.getBookDetail(bookId);
        return resultHandler.parseBookDetail(result);
    }

    public boolean buyBook(String id, String author, int total) throws  Exception {
        boolean result = BuyBook.upsert(id,author,total);
        return result;
    }
    // Publisher part
    public static void main(String[] argv) {
        Object implementor = new BookCatalogueImpl();
        String address = "http://localhost:9000/BookCatalogueWebService";
        Endpoint.publish(address, implementor);

        System.out.println("Service is up !");
    }
}
