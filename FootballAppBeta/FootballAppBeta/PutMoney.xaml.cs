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
using System.ComponentModel.Design;

// To learn more about WinUI, the WinUI project structure,
// and more about our project templates, see: http://aka.ms/winui-project-info.

namespace FootballAppBeta
{
    /// <summary>
    /// An empty window that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class PutMoney : Window
    {
        public PutMoney()
        {
            this.InitializeComponent();
        }
        private async void ButtonClickPutMoney(object sender, RoutedEventArgs e)
        {
            int chance;
            int chance2;
            string matchId = Match.Text;
            string teamId = Team.Text;
            string TourmentId = Tourment.Text;
            if (int.TryParse(ExtraMoneyForGambling.Text, out chance) && int.TryParse(Tourment.Text, out chance2))
            {
                if (chance < 1)
                {
                    error.Text = "Voer het bedrag hoger and 1 in";
                }
                using (var context = new MyDbContext())
                {

                    // Create a new GamblingTurn instance
                    var newGamblingTurn = new GamblingTurn
                    {
                        MatchId = matchId,
                        TeamId = teamId,
                        moneyForGambling = chance,
                        TourmentId = chance2,
                    };

                    // Add the new instance to the DbSet
                    context.GamblingTurns.Add(newGamblingTurn);

                    // Save changes to the database
                    context.SaveChanges();
                }

            }
            else
            {
                error.Text = "Voer een geldig bedrag in";
            }

        }
    }
}

       
