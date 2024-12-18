using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices.WindowsRuntime;
using Windows.Foundation;
using Windows.Foundation.Collections;
using Microsoft.UI.Xaml;
using Microsoft.UI.Xaml.Controls;
using Microsoft.UI.Xaml.Controls.Primitives;
using Microsoft.UI.Xaml.Data;
using Microsoft.UI.Xaml.Input;
using Microsoft.UI.Xaml.Media;
using Microsoft.UI.Xaml.Navigation;
using System.Diagnostics;
using Windows.System;
using FootballAppBeta.Migrations;
using Microsoft.EntityFrameworkCore;

// To learn more about WinUI, the WinUI project structure,
// and more about our project templates, see: http://aka.ms/winui-project-info.

namespace FootballAppBeta
{
    /// <summary>
    /// An empty window that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class Gambling : Window
    {
        private readonly ApiReader apiReader;
        public Gambling()
        {
            this.InitializeComponent();
            apiReader = new ApiReader();
            LoadGames();
            ShowUserBalance();
        }
        private void ChangePagePutMoney(object sender, RoutedEventArgs e)
        {
            PutMoney i = new PutMoney();
            i.Activate();
        }
        private void ChangePageWinnerList(object sender, RoutedEventArgs e)
        {
            WinnerList i = new WinnerList();
            i.Activate();
        }
        public async void LoadGames()
        {
            var apiReader = new FootballAppBeta.ApiReader();
            // Fetch available games
            var games = apiReader.GetGames2();

            // Set the ItemsSource of the ListView to the list of games
            GamesListView.ItemsSource = games;
            

        }
        public void ShowUserBalance()
        {
            MyDbContext dbContext = new MyDbContext();
            var user = dbContext.Users.FirstOrDefault(u => u.Id == 1);
            Balance.Text = "Balans: " + user.balance.ToString() + "coints";
        }
    }
}
