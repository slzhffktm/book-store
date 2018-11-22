package BookCatalogueWebService;
import org.json.JSONObject;

import javax.jws.WebService;
import javax.xml.ws.Endpoint;
import java.sql.ResultSet;

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

    public boolean buyBook(String id, String card, int total) throws  Exception {
        String result =  getBookDetail(id);
        JSONObject jsonResult = new JSONObject(result);
        String[] genre = jsonResult.getString("Category").replaceAll(" ","").split("/");
        boolean response = BuyBook.upsert(id, genre, total);
        return response;
    }

    public String getRecommendation(String[] genres) {
        String result = Recommendation.get(genres);
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
