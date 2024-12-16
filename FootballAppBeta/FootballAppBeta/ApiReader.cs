using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Threading.Tasks;
using System.Diagnostics;
using ABI.System;
using Windows.Media.Protection.PlayReady;
using System;
using System.Diagnostics.Metrics;
using System.Diagnostics;
using System.Net.Http;
using System.Text.Json;
using System.Text.Json.Serialization;
using System;
using System.Diagnostics.Metrics;
using System.Diagnostics;
using System.Net.Http;
using System.Text.Json;
using System.Text.Json.Serialization;
using System.Collections.Generic;
using System.Linq;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Net.Http;
using System.Threading.Tasks;
using System.Diagnostics.Metrics;
using System.Diagnostics;
using System.Net.Http;
using System.Text.Json;
using System.Text.Json.Serialization;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http.Json;
using static FootballAppBeta.ApiReader;

namespace FootballAppBeta
{
    public class ApiReader
    {
        private readonly HttpClient Client;
        private const string Url = "http://schoolvoetbal4s.test/api/games";

        public ApiReader()
        {
            Client = new HttpClient();
        }

        public List<QuoteApiResponse> GetGames()
        {
            var response = Client.GetAsync(Url).Result;
            if (response.IsSuccessStatusCode)
            {
                var responseContent = response.Content.ReadAsStringAsync().Result;
                // Deserialize the response into a list of QuoteApiResponse
                var gamesResponse = JsonConvert.DeserializeObject<List<QuoteApiResponse>>(responseContent);
                return gamesResponse;
            }


            return new List<QuoteApiResponse>();
        }
        public List<QuoteApiResponse> GetGames2()
        {
            var response = Client.GetAsync(Url).Result;
            if (response.IsSuccessStatusCode)
            {
                var responseContent = response.Content.ReadAsStringAsync().Result;
                var gamesResponse = JsonConvert.DeserializeObject<List<QuoteApiResponse>>(responseContent);
                var filteredGames = gamesResponse.Where(game => game.winner_id == 0).ToList();

                return filteredGames;
            }

            return new List<QuoteApiResponse>();
        }
        public List<QuoteApiResponse> GetGames3()
        {
            var response = Client.GetAsync(Url).Result;
            if (response.IsSuccessStatusCode)
            {
                var responseContent = response.Content.ReadAsStringAsync().Result;
                var gamesResponse = JsonConvert.DeserializeObject<List<QuoteApiResponse>>(responseContent);
                var filteredGames = gamesResponse.Where(game => game.winner_id > 0).ToList();

                return filteredGames;
            }

            return new List<QuoteApiResponse>();
        }
        public struct QuoteResult
        {
            public int match_id;
            public int winner_id;
            public string Team1Name;
            public string Team2Name;
            public int Tourment;
        }

        public class QuoteApiResponse
        {
            [JsonProperty("winner_id")]
            public int winner_id { get; set; }
            [JsonProperty("match_id")]
            public int match_id { get; set; }
            [JsonProperty("team1_name")]
            public string Team1Name { get; set; }

            [JsonProperty("team2_name")]
            public string Team2Name { get; set; }
            [JsonProperty("Tourment")]
            public int Tourment { get; set; }
        }
    }
}
        //    private readonly HttpClient Client;
        //    private const string Url = "http://schoolvoetbal4s.test/api/games";

        //    public ApiReader()
        //    {
        //        Client = new HttpClient();
        //    }

        //    public QuoteResult QuoteCurrency()
        //    {
        //        string url = $"{Url}";
        //        var response = Client.GetStringAsync(url).Result;
        //        Debug.Write(url);
        //        Debug.WriteLine(response);

        //        var quoteResponse = JsonConvert.DeserializeObject<QuoteApiResponse>(response);

        //        if (quoteResponse != null)
        //        {
        //            return new QuoteResult
        //            {
        //                //MatchId = quoteResponse.MatchId,
        //                //Team1Id = quoteResponse.Team1Id,
        //                Team1Name = quoteResponse.Team1Name,
        //                //Team2Id = quoteResponse.Team2Id,
        //                Team2Name = quoteResponse.Team2Name,
        //               // WinnerId = quoteResponse.WinnerId,
        //            };
        //        }
        //        return new QuoteResult();
        //    }
        //    public List<string> GetAvailableQuote()
        //    {
        //        try
        //        {
        //            var response = Client.GetAsync($"{Url}").Result;
        //            if (response.IsSuccessStatusCode)
        //            {

        //                var responseContent = response.Content.ReadAsStringAsync().Result;
        //                var currenciesResponse = JsonConvert.DeserializeObject<QuoteResponse>(responseContent);
        //                if (currenciesResponse.games != null)
        //                {
        //                    return currenciesResponse.games.Keys.ToList();
        //                }
        //            }
        //        }
        //        catch (System.Exception ex)
        //        {
        //            Console.WriteLine($"An error occurred: {ex.Message}");
        //        }

        //        return new List<string>();
        //    }

        //    public struct QuoteResponse
        //    {
        //        public Dictionary<string, string> games { get; set; }
        //    }

        //    public struct QuoteResult
        //    {
        //        public int MatchId;
        //        public int Team1Id;
        //        public string Team1Name;
        //        public int Team2Id;
        //        public string Team2Name;
        //        public int WinnerId;
        //    }
        //    public class QuoteApiResponse
        //    {
        //        [JsonProperty("team1_name")]
        //        public string Team1Name { get; set; }


        //        [JsonProperty("team2_name")]
        //        public string Team2Name { get; set; }

        //        //[JsonProperty("winner_id")]
        //        //public int WinnerId { get; set; }
        //    }
        //}
    

//namespace FootballAppBeta
//{
//    public class ApiReader
//    {
//        private readonly HttpClient Client;
//        private const string Url = "http://schoolvoetbal4s.test/api/games";

//        public ApiReader()
//        {
//            Client = new HttpClient();
//        }

//        public async Task<List<GameResult>> FetchGame()
//        {
//            string url = $"{Url}";
//            var response = Client.GetStringAsync(url).Result;
//            Debug.Write(url);
//            Debug.WriteLine(response);

//           //var gameResponse = JsonConvert.DeserializeObject<List<GameApiResponse>>(response);
//            var gameResponse = JsonConvert.DeserializeObject<GameApiResponse>(response);

//            if (gameResponse != null)
//            {
//                return new List<GameResult>
//                {
//                    new GameResult{
//                    MatchId = gameResponse.MatchId,
//                    Team1Id = gameResponse.Team1Id,
//                    Team1Name = gameResponse.Team1Name,
//                    Team2Id = gameResponse.Team2Id,
//                    Team2Name = gameResponse.Team2Name,
//                    WinnerId = gameResponse.WinnerId, }
//                };
//            }
//            return new List<GameResult>();
//        }
//        public List<string> GetAvailableQuote()
//        {
//            try
//            {
//                var response = Client.GetAsync($"{Url}").Result;
//                if (response.IsSuccessStatusCode)
//                {

//                    var responseContent = response.Content.ReadAsStringAsync().Result;
//                    var gamesResponse = JsonConvert.DeserializeObject<GameResponse>(responseContent);
//                    if (gamesResponse.games != null)
//                    {
//                        return gamesResponse.games.Keys.ToList();
//                    }
//                }
//            }
//            catch (System.Exception ex)
//            {
//                Console.WriteLine($"An error occurred: {ex.Message}");
//            }

//            return new List<string>();
//        }
//        public struct GameResponse
//        {
//            public Dictionary<string, string> games { get; set; }
//        }

//        public struct GameResult
//        {
//            public int MatchId;
//            public int Team1Id;
//            public string Team1Name;
//            public int Team2Id;
//            public string Team2Name;
//            public int WinnerId;
//        }
//        public class GameApiResponse
//        {
//            [JsonProperty("id")]
//            public int MatchId { get; set; }

//            [JsonProperty("team1_id")]
//            public int Team1Id { get; set; }

//            [JsonProperty("team1_name")]
//            public string Team1Name { get; set; }

//            [JsonProperty("team2_id")]
//            public int Team2Id { get; set; }

//            [JsonProperty("team2_name")]
//            public string Team2Name { get; set; }

//            [JsonProperty("winner_id")]
//            public int WinnerId { get; set; }
//        }
//    }
//}


