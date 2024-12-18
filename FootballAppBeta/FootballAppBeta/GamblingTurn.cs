using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace FootballAppBeta
{
    class GamblingTurn
    {
        public int Id { get; set; }
        public string MatchId { get; set; }
        public string TeamId { get; set; }

        public int moneyForGambling { get; set; }
        public int TourmentId { get; set; }
        public int isActive { get; set; }
    }
}
