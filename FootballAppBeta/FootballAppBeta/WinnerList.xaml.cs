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

// To learn more about WinUI, the WinUI project structure,
// and more about our project templates, see: http://aka.ms/winui-project-info.

namespace FootballAppBeta
{
    /// <summary>
    /// An empty window that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class WinnerList : Window
    {
        public WinnerList()
        {
            this.InitializeComponent();
            LoadGames();
        }
        public async void LoadGames()
        {
            var apiReader = new FootballAppBeta.ApiReader();
            // Fetch available games
            var games = apiReader.GetGames3();

            // Set the ItemsSource of the ListView to the list of games
            GamesListView.ItemsSource = games;


        }
    }
}
