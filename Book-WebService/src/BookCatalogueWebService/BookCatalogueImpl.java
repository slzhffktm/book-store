package BookCatalogueWebService;
import org.json.JSONObject;

import javax.jws.WebService;
import javax.jws.soap.SOAPBinding;
import javax.xml.ws.Endpoint;

@WebService()
@SOAPBinding()
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

    public boolean buyBook(String id, String cardId, int total) throws  Exception {
        String result =  getBookDetail(id);
        JSONObject jsonResult = new JSONObject(result);
        String[] genre = jsonResult.getString("Category").replaceAll(" ","").split("/");
        float cost = BuyBook.getCost(id) * total;
        System.out.println("Cost: " + cost);
        boolean response = false    ;
        try{
            if (cost < 0){
                throw new Exception();
            }
            String postResponse = BuyBook.sendPost(cardId, cost);
            System.out.println(postResponse);
            // TODO: response checking
            response = BuyBook.upsert(id, genre, total);
        } catch (Exception e){

        }

        return response;
    }
    // Publisher part
    public static void main(String[] argv) {
        Object implementor = new BookCatalogueImpl();
        String address = "http://localhost:9000/BookCatalogueWebService";
        Endpoint.publish(address, implementor);

        System.out.println("Service is up !");
    }
}
