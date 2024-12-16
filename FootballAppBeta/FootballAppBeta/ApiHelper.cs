using Microsoft.EntityFrameworkCore;
using System;

using Microsoft.EntityFrameworkCore;
using System;
using System.IO;
using System.Linq;
using System.Diagnostics;
using Microsoft.EntityFrameworkCore.Internal;
using System.Collections.Generic;
using FootballAppBeta;
using Windows.UI;

namespace FootballAppBeta
{
    class ApiHelper
    {
        public void ApiDatabaseComparing()
        {
            try
            {
                ApiReader apiReader = new ApiReader();
                var games = apiReader.GetGames();
                int winnerId = games.FirstOrDefault()?.winner_id ?? 0;

                using (var dbContext = new MyDbContext())
                {
                    var gamblingTurns = dbContext.GamblingTurns.ToList();
                    var results = new List<string>();

                    // Houd bij hoeveel er per Tourment wordt uitgegeven
                    var tourmentSpending = new Dictionary<int, int>();

                    foreach (var turn in gamblingTurns)
                    {
                        bool won = int.TryParse(turn.TeamId, out int teamId) && teamId == winnerId;
                        int amount = turn.moneyForGambling;

                        // Haal de huidige uitgaven voor het toernooi op
                        int currentSpending = tourmentSpending.ContainsKey(turn.TourmentId) ? tourmentSpending[turn.TourmentId] : 0;

                        // Bereken hoeveel nog mag worden uitgegeven
                        int remaining = 50 - currentSpending;

                        // Pas het bedrag aan als het over de limiet gaat
                        if (amount > remaining)
                        {
                            amount = remaining;
                        }

                        // Werk de uitgaven bij voor dit toernooi
                        if (tourmentSpending.ContainsKey(turn.TourmentId))
                        {
                            tourmentSpending[turn.TourmentId] += amount;
                        }
                        else
                        {
                            tourmentSpending[turn.TourmentId] = amount;
                        }

                        // Genereer log en update balans
                        int adjustedAmount = won ? amount * 2 : -amount;
                        string result = GenerateLogEntry(turn.TeamId, won, adjustedAmount);
                        results.Add(result);

                        Balance(dbContext, 1, adjustedAmount);
                    }

                    // Schrijf resultaten naar bestand
                    using (StreamWriter writer = new StreamWriter(@"C:\\Users\martw\RiderProjects\FootballAppBeta\FootballAppBeta\balance.txt"))
                    {
                        foreach (var result in results)
                        {
                            writer.WriteLine(result);
                        }
                    }
                }
            }
            catch (Exception ex)
            {
                Debug.WriteLine($"Error during API and database comparison: {ex.Message}");
            }
        }
        public void ApiDatabaseComparingBeta()
        {
            try
            {
                ApiReader apiReader = new ApiReader();
                var games = apiReader.GetGames();
                int winnerId = games.FirstOrDefault()?.winner_id ?? 0;

                using (var dbContext = new MyDbContext())
                {
                    var gamblingTurns = dbContext.GamblingTurns.ToList();
                    var results = new List<string>();

                    foreach (var turn in gamblingTurns)
                    {
                        bool won = int.TryParse(turn.TeamId, out int teamId) && teamId == winnerId;
                        int amount = won ? turn.moneyForGambling * 2 : turn.moneyForGambling;
                        string result = GenerateLogEntry(turn.TeamId, won, amount);
                        results.Add(result);
                        //var user = MyDbContext.Users.FirstOrDefault(u => u.Id == 1);
                        //if (user == null)
                        //{
                        //    Debug.WriteLine("User with ID 1 not found.");
                        //    return;
                        //}
                        //user.Balance += won ? amount : -turn.moneyForGambling;
                        // dbContext.SaveChanges();
                        Balance(dbContext, 1, won ? amount : -turn.moneyForGambling);

                    }

                    // Write each result to the file
                    using (StreamWriter writer = new StreamWriter(@"C:\\Users\martw\RiderProjects\FootballAppBeta\FootballAppBeta\balance.txt"))
                    {
                        foreach (var result in results)
                        {
                            writer.WriteLine(result);
                        }
                    }
          //          var user = dbContext.Users.FirstOrDefault(u => u.Id == turn.UserId); // Assuming you have UserId in GamblingTurn
                   
                }
            }
            catch (Exception ex)
            {
                Debug.WriteLine($"Error during API and database comparison: {ex.Message}");
            }
           
        }
        private void Balance(MyDbContext dbContext, int userId, int amount)
        {
            try
            {
                var user = dbContext.Users.FirstOrDefault(u => u.Id == userId);
                if (user == null)
                {
                    Debug.WriteLine($"User with ID {userId} not found.");
                    return;
                }

                // Update the user's balance
                user.balance += amount;

                // Save changes to the database
                dbContext.SaveChanges();
            }
            catch (Exception ex)
            {
                Debug.WriteLine($"Error updating balance for User ID {userId}: {ex.Message}");
            }
        }
        private string GenerateLogEntry(string teamId, bool won, int amount)
        {
            string result = won ? "winst" : "verlies";
            return $"Team {teamId} heeft {result}: {amount} op {DateTime.Now}";
        }
        private void Balance()
        {
            
        }

    }

}




//    private string GenerateLogEntry(string teamId, bool won, int amount)
//    {
//        string result = won ? "winst" : "verlies";
//        return $"Team {teamId} heeft {result}: {amount} op {DateTime.Now}";
//    }
//}
//private const string LogFile = "GamblingResults.txt";
//private const int MinimumLoss = 10; // Minimum amount to deduct on loss
//private const int WinBonus = 20; // Amount to add on win

//public void ApiDatabaseComparing()
//{
//    try
//    {
//        ApiReader apiReader = new ApiReader();
//        var games = apiReader.GetGames();

//        using (var dbContext = new MyDbContext())
//        {
//            var gamblingTurns = dbContext.GamblingTurns.ToList();
//            var results = new List<string>();

//            foreach (var turn in gamblingTurns)
//            {
//                foreach (var game in games)
//                {
//                    int winnerId = game.winner_id;
//                    bool won = int.TryParse(turn.TeamId, out int teamId) && teamId == winnerId;

//                    int amount = won ? turn.moneyForGambling * 2 : turn.moneyForGambling;
//                    string result = GenerateLogEntry(turn.TeamId, won, amount);
//                    results.Add(result);

//                    string balanceMessage = won
//                        ? $"User won: +{WinBonus} (Total: {amount})"
//                        : $"User lost: -{MinimumLoss} (Total: {amount})";

//                    WriteBalanceChangeToFile(balanceMessage);
//                }
//            }
//            using (StreamWriter writer = new StreamWriter(LogFile, true))
//            {
//                foreach (var result in results)
//                {
//                    writer.WriteLine(result);
//                }
//            }
//        }
//    }
//    catch (Exception ex)
//    {
//        Debug.WriteLine($"Error during API and database comparison: {ex.Message}");
//    }
//}

//private string GenerateLogEntry(string teamId, bool won, int amount)
//{
//    string result = won ? "winst" : "verlies";
//    return $"Team {teamId} heeft {result}: {amount} op {DateTime.Now}";
//}

//private void WriteBalanceChangeToFile(string message)
//{
//    using (StreamWriter writer = new StreamWriter(LogFile, true))
//    {
//        writer.WriteLine(message);
//    }
//}